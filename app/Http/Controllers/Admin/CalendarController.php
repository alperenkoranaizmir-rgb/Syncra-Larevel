<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('vendor.adminlte.pages.calendar');
    }

    public function events(Request $request)
    {
        $events = Event::all()->map(function ($e) {
            return [
                'id' => $e->id,
                'title' => $e->title,
                'start' => $e->start->toIsoString(),
                'end' => $e->end ? $e->end->toIsoString() : null,
                'allDay' => (bool) $e->all_day,
            ];
        });

        return response()->json($events);
    }
}
