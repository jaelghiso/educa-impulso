<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventResource::collection(Event::latest()->paginate(16));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'event_date' => 'required',
            'event_time' => 'required',
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'tags' => 'required',
            'topics' => 'required',
        ]);

        $event = new Event;

        $event->user_id = $request->user_id;
        $event->course_id = $request->course_id;
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->priority = $request->priority;
        $event->tags = $request->tags;
        $event->topics = $event->topics;
        $event->save();

        return new EventResource($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'event_date' => 'required|dateformat:Y-m-d',
            'event_time' => 'required|date_format:H:m',
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'tags' => 'required',
            'topics' => 'required',
        ]);

        $event->update($request->only(['event_date', 'event_time', 'title', 'description', 'priority', 'tags', 'topics']));

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(null, 204);
    }
}
