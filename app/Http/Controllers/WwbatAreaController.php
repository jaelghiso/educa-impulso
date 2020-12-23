<?php

namespace App\Http\Controllers;

use App\Models\WwbatArea;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Resources\WWbatAreaResource;

class WwbatAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WwbatAreaResource::collection(WwbatArea::latest()->paginate(16));
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
        $this->validate($request, ['description' => 'required',]);

        $wwbatArea = new WwbatArea;

        $wwbatArea->user_id = $request->user_id;
        $wwbatArea->class_id = $classroom->id;
        $wwbatArea->description = $request->description;
        $wwbatArea->save();

        return new WwbatAreaResource($wwbatArea);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WwbatArea  $WwbatArea
     * @return \Illuminate\Http\Response
     */
    public function show(WwbatArea $wwbatArea)
    {
        return new WwbatAreaResource($wwbatArea);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WwbatArea  $WwbatArea
     * @return \Illuminate\Http\Response
     */
    public function edit(WwbatArea $wwbatArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WwbatArea  $WwbatArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WwbatArea $wwbatArea)
    {
        $this->validate($request, ['description' => 'required',]);

        $wwbatArea->update($request->only(['description']));

        return new WwbatAreaResource($wwbatArea);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WwbatArea  $WwbatArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(WwbatArea $wwbatArea)
    {
        $wwbatArea->delete();

        return response()->json(null, 204);
    }
}
