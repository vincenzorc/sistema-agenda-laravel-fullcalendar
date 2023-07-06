<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Event::$rules);

        $event = Event::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event = Event::all();
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $event->start = Carbon::createFromFormat('Y-m-d H:i:s', $event->start)->format('Y-m-d');
        $event->end = Carbon::createFromFormat('Y-m-d H:i:s', $event->end)->format('Y-m-d');
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        request()->validate(Event::$rules);
        $event->update($request->all());

        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();
        return response()->json($event);
    }
}
