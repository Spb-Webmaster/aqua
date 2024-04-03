<?php
namespace App\Http\Controllers;
use App\Models\EventCategory;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $event_categories = EventCategory::query()->get();

        return view('home', [
            'event_categories' => $event_categories,

        ]);
    }
}
