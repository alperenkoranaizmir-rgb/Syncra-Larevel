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
                'description' => $e->description,
            ];
        });

        return response()->json($events);
    }

    public function show($id)
    {
        $e = Event::findOrFail($id);
        return response()->json($e);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date',
            'all_day' => 'sometimes|boolean',
            'description' => 'nullable|string',
        ]);

        $event = Event::create([
            'title' => $data['title'],
            'start' => $data['start'],
            'end' => $data['end'] ?? null,
            'all_day' => $data['all_day'] ?? false,
            'description' => $data['description'] ?? null,
        ]);

        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        $e = Event::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date',
            'all_day' => 'sometimes|boolean',
            'description' => 'nullable|string',
        ]);

        $e->update([
            'title' => $data['title'],
            'start' => $data['start'],
            'end' => $data['end'] ?? null,
            'all_day' => $data['all_day'] ?? false,
            'description' => $data['description'] ?? null,
        ]);

        return response()->json($e);
    }

    public function destroy($id)
    {
        $e = Event::findOrFail($id);
        $e->delete();
        return response()->json(['deleted' => true]);
    }
}
