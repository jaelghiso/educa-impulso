<?php

namespace App\Http\Controllers;

use App\Models\ScheduleArea;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Resources\ScheduleAreaResource;

class ScheduleAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ScheduleAreaResource::collection(ScheduleArea::latest()->paginate(16));
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
    public function store(Request $request, Classroom $classroom)
    {
        $this->validate($request, ['description' => 'required']);

        $scheduleArea = new ScheduleArea;

        $scheduleArea->user_id = $request->user_id;
        $scheduleArea->class_id = $classroom->id;
        $scheduleArea->description = $request->descrition;
        $scheduleArea->save();

        return new ScheduleAreaResource($scheduleArea);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleArea $scheduleArea)
    {
        return new ScheduleAreaResource($scheduleArea);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update(Request $request, ScheduleArea $scheduleArea)
    {
        $this->validate($request, ['description' => 'required']);

        $scheduleArea->update($request->only(['description']));

        return new ScheduleAreaResource($scheduleArea);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleArea $scheduleArea)
    {
        $scheduleArea->delete();

        return response()->json(null, 204);
    }
}
