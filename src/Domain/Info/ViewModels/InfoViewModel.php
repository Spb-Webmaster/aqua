<?php
namespace Domain\Info\ViewModels;

use App\Models\Info;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class InfoViewModel
{
    use Makeable;

    public function OneInfo($slug)
    {
         $infos = Cache::rememberForever('info', function () {

            return Info::query()
                ->get_infos()
                ->get();
        });

        $info = $infos->firstWhere('slug', $slug);
        return $info;

    }



}
