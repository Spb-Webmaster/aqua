<?php

namespace App\Http\Controllers\Event;

use App\Http\Requests\AddEventRequest;
use App\Http\Requests\DeleteEventRequest;
use App\Models\EventCategory;
use App\Models\EventItem;
use App\Models\EventJudge;
use App\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventController
{
    public function add(AddEventRequest $request)
    {
        $judge = array_filter($request->judge, static function($var){return $var !== null;} ); /* удалим лишнее */


        $fileModel = new File;
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'files');
            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->title = $request->title;
            $fileModel->file_path = '/storage/files/' . $filePath;
            $fileModel->save();
        }
        if (!File::exists(public_path($fileModel->file_path))){
            flash()->alert('php artisan storage:link'); // ошибка в файле
            return redirect()->back();
        }

        $url = asset($fileModel->file_path);


        $data = parserHTML($url);
       if(is_null($data)) {
           flash()->alert('Error Html File'); // ошибка в файле
           return redirect()->back();

       }


        $eventCategory = new EventCategory;
        $eventCategory->title = $request->title;
        $eventCategory->save();


        for ($i = 0, $y = 1; $i < count($data); $i++, $y++) {
            // dump($data[$i]);
            $eventItem = new EventItem;
            $eventItem->title = $data[$i]['title'];
            $eventItem->subtitle = $data[$i]['subtitle'];
            $eventItem->event_category_id = $eventCategory->id;
            $eventItem->number = $y;
            $eventItem->flag = $data[$i]['th'][2]['flag'];
            $eventItem->name = $data[$i]['th'][3]['name'];
            $eventItem->country = $data[$i]['th'][4]['country'];
            $eventItem->category = $data[$i]['th'][5]['category'];
            $eventItem->score = $data[$i]['th'][6]['score'];
            $eventItem->params_sport = json_encode($data[$i]['td']);

            //    dump($data[$i]);

            $eventItem->save();
        }


        $eventJudge = new EventJudge;
        $eventJudge->params = $judge;
        $eventJudge->event_category_id = $eventCategory->id;
        $eventJudge->save();

        flash()->info('An event has been created'); // создано событие
        return redirect('/event/' . $eventCategory->id);

    }

    public function delete(DeleteEventRequest $request){

        if(role(auth()->user()->id) == 'manager') {
            /**
             * Получаем страницу откуда пришли
             * $last
             */
            $url = url()->previous();
            $slugs = explode("/", $url);
            $last = $slugs [(count($slugs) - 1)];
            if ($last == $request->id) {

                EventItem::query()->where('event_category_id', $request->id)->delete();
                EventCategory::find($request->id)->delete();

                flash()->info('The event was deleted successfully'); // удалено событие
                return redirect('/');

            }
        }
        flash()->alert('An error occurred while deleting'); // ошибка
        return redirect('/');

    }

    public function selectCategory($category_id)
    {
        $event_category = EventCategory::query()->find($category_id);

        return view('events.event_category', [
            'event_category' => $event_category
        ]);

    }

    public function selectItem($category_id, $item_id)
    {

        $event_item = EventItem::query()
            ->where('id',$item_id)
            ->where('event_category_id',$category_id)
            ->first();

        $event_category = EventCategory::query()->find($category_id);

        $params = $event_item->params_sport;
        foreach ($params as $k=>$v ) {
            $params_sport = json_decode($v);
        }

        if(is_null($event_item->params_judge)) {
            $params_judge = [];
        } else {
            $params = $event_item->params_judge;
            foreach ($params as $k => $v) {
                $params_judge = json_decode($v);
            }
        }

        if(is_null($event_item->params_score)) {
            $params_score = [];
        } else {
            $params = $event_item->params_score;
            foreach ($params as $k => $v) {
                $params_score = json_decode($v);
            }
        }


        $sport = [];



            foreach ($params_sport as $k=>$p) {
                $sport[$k]['sport'] = $p;
                if ($params_judge) {
                    $sport[$k]['judge'] = ($params_judge->{$k})??(object)['judge'=> array(0 => '',1 => '',2 => '')];
                } else {
                    $sport[$k]['judge'] = (object)['judge'=> array(0 => '',1 => '',2 => '')];
                }
                if ($params_score) {
                    $sport[$k]['score'] = ($params_score->{$k})??(object)['score'=> (object) array(1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => '', 7 => '', 8 => '', 9 => '')];
                } else {
                    $sport[$k]['score'] = (object)['score'=> (object) array(1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => '', 7 => '', 8 => '', 9 => '')];
                }
            }


        return view('events.event_item', [
            'event_item' => $event_item,
            'event_category' => $event_category,
            'sport' => $sport,
        ]);

    }

    public function score(Request $request)
    {
       // dd($request->all());

        $eventItem = EventItem::query()->find($request->event_item);

        $data = [];
        $j = []; // judge
        $s = []; // score



            if(is_null($eventItem->params_judge)) {
                $data[$request->num]['judge'] =  $request->judge;
                $j = $data;
            } else {
                $data['judge'] =  $request->judge;
                $j = json_decode($eventItem->params_judge[0]);
                $j->{"$request->num"} = $data;
            }
        $data = [];
            if(is_null($eventItem->params_score)) {

                $data[$request->num]['score'][1] =  $request->score1;
                $data[$request->num]['score'][2] =  $request->score2;
                $data[$request->num]['score'][3] =  $request->score3;
                $data[$request->num]['score'][4] =  $request->score4;
                $data[$request->num]['score'][5] =  $request->score5;
                $data[$request->num]['score'][6] =  $request->score6;
                $data[$request->num]['score'][7] =  $request->score7;
                $data[$request->num]['score'][8] =  $request->score8;
                $data[$request->num]['score'][9] =  $request->score9;
                $s = $data;
            } else {
                $data['score'][1] =  $request->score1;
                $data['score'][2] =  $request->score2;
                $data['score'][3] =  $request->score3;
                $data['score'][4] =  $request->score4;
                $data['score'][5] =  $request->score5;
                $data['score'][6] =  $request->score6;
                $data['score'][7] =  $request->score7;
                $data['score'][8] =  $request->score8;
                $data['score'][9] =  $request->score9;

                $s = json_decode($eventItem->params_score[0]);
                $s->{"$request->num"} = $data;
            }


        $eventItem->params_judge = json_encode($j);
        $eventItem->params_score = json_encode($s);

        $eventItem->update();

        return redirect()->back()->withFragment($request->yakor_id);
    }
}
