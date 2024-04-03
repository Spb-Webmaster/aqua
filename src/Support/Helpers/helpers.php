<?php

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Support\Flash\Flash;
use Illuminate\Support\Facades\Route;


if (!function_exists('flash')) {

    function flash(): Flash
    {
        return app(Flash::class);
    }
}


/* Удаляем кэш  */

if (!function_exists('cache_clear ')) {
    function cache_clear($model = null)
    {
      //  Cache::forget('top_menutours');
     }
}

/* парсим файл с таблицей */

if (!function_exists('parserHTML')) {
    function parserHTML($url)
    {


        $doc  = phpQuery::newDocumentFileHTML($url);
        $titles = $doc->find('h3');
        $subtitles = $doc->find('h5');
        $tables = $doc->find('table');
$data = [];
        foreach ($titles as $k=>$row) {
            $data[$k]['title'] = (pq($row)->text())?:'';
        }
        foreach ($subtitles as $k=>$row) {
            $data[$k]['subtitle'] = (pq($row)->text())?:'';
        }
        foreach ($tables as $k=>$row) {
            // dd(count(pq($row)->find('th')));

            foreach (pq($row)->find('th') as $key => $th) {
                if($key == 2) {
                    $data[$k]['th'][$key]['flag'] = 'flag';
                }
                if($key == 3) {
                    $data[$k]['th'][$key]['name'] = (trim(pq($th)->text()," \t\n\r\0\x0B\xc2\xa0"))?:'';
                }
                if($key == 4) {
                    $data[$k]['th'][$key]['country'] = (trim(pq($th)->text()," \t\n\r\0\x0B\xc2\xa0"))?:'';
                }
                if($key == 5) {
                    $data[$k]['th'][$key]['category'] = (trim(pq($th)->text()," \t\n\r\0\x0B\xc2\xa0"))?:'';
                }
                if($key == 6) {
                    $data[$k]['th'][$key]['score'] =  (trim(pq($th)->text()," \t\n\r\0\x0B\xc2\xa0"))?:'';
                }
            }


            foreach (pq($row)->find('tr') as $key => $tr) {

                foreach (pq($tr)->find('td') as $keyy => $td) {

                    if($keyy == 2) {
                        $data[$k]['td'][$key][$keyy] = '--';
                    }


                    if($keyy == 3) {
                        $data[$k]['td'][$key][$keyy] = (trim(pq($td)->text()," \t\n\r\0\x0B\xc2\xa0"))?:'';
                    }


                    if($keyy == 4) {
                        $data[$k]['td'][$key][$keyy] =  (trim(pq($td)->text()," \t\n\r\0\x0B\xc2\xa0"))?:'';
                    }


                    if($keyy == 5) {
                        $data[$k]['td'][$key][$keyy] =  (trim(pq($td)->text()," \t\n\r\0\x0B\xc2\xa0"))?:'';
                    }


                    if($keyy == 6) {
                        $data[$k]['td'][$key][$keyy] = (trim(pq($td)->text()," \t\n\r\0\x0B\xc2\xa0"))?:'';
                    }



                }


            }

        }
if($data) {

    return collect($data);
}
return null;

    }
}


if (!function_exists('clearFolder')) {

    function clearFolder($path, $disk)
    {

        if (Storage::disk($disk)->directoryExists($path)) {

            $folderPath = public_path('storage/' . $disk . '/' . $path);

            File::deleteDirectory($folderPath);

            return __('Папка успешно очищена и удалена.');

        }
        return __('Папка не существует, файлов не было удалено.');


    }
}


if (!function_exists('num2word')) {

    function num2word($num, $words)
    {
        $num = $num % 100;
        if ($num > 19) {
            $num = $num % 10;
        }
        switch ($num) {
            case 1:
            {
                return ($words[0]);
            }
            case 2:
            case 3:
            case 4:
            {
                return ($words[1]);
            }
            default:
            {
                return ($words[2]);
            }
        }
    }


}



if (!function_exists('ext')) {

    function ext($ext): string
    {
        switch (mb_strtolower($ext)) {
            case 'jpg':
                $result = '/images/files/jpg.svg';
                break;
            case 'jpeg':
                $result = '/images/files/jpg.svg';
                break;
            case 'doc':
                $result = '/images/files/doc.svg';
                break;
            case 'docx':
                $result = '/images/files/doc.svg';
                break;
            case 'png':
                $result = '/images/files/jpg.svg';
                break;
            case 'txt':
                $result = '/images/files/txt.svg';
                break;
            case 'zip':
                $result = '/images/files/zip.svg';
                break;
            case 'rar':
                $result = '/images/files/zip.svg';
                break;
            case 'pdf':
                $result = '/images/files/pdf.svg';
                break;
            default:
                $result = '/images/files/zip.svg';

        }
        return $result;
    }
}

if (!function_exists('active_link')) {
    function active_link(string|array $names, string $class = 'active'): string|null
    {

        if (is_string($names)) {
            $names = [$names];
        }
        return Route::is($names) ? $class : null;
    }
}


if (!function_exists('active_linkMenu')) {
    function active_linkMenu($url, string $find = null, string $class = 'active'): string|null
    {

        if($find) {
            if(str_starts_with(url()->current(), trim($url))) {
                return $class;
            }
            return  null;

        }


        return ($url == url()->current() ) ? $class : null;
    }
}



if (!function_exists('route_name')) {
    function route_name():string|null
    {

        return Route::currentRouteName();
    }
}


if (!function_exists('role')) {

    function role($id = null): string
    {
        if (!auth()->user()) {
            return 'guest';
        }

        if ($id) {

            $user = User::query()
                ->where('id', $id)
                ->first();


            if ($user) {
                if ($user->role->name == 'manager') {
                    return 'manager';
                }
                if ($user->role->name == 'judge') {
                    return 'judge';
                }
            }
            return 'error_id';

        }

    }
}









