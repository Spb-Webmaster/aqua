<?php

namespace App\View\Composers;

use App\Models\EventCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class LeftmenuComposer
{
    public function compose(View $view): void
    {

        $event_category_left =  EventCategory::query()->take(100)->get();

        $view->with([
            'event_category_left' => $event_category_left,
        ]);

    }
}
