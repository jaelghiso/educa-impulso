<?php

namespace App\Http\Controllers;

use App\Models\DoNowArea;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Resources\DoNowResource;

class DoNowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DoNowResource::collection(DoNowArea::latest()->paginate(16));
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
        $this->validate($request, [
            'description' => 'required',
            'urlDoNow' => 'url',
        ]);

        $doNowArea = new DoNowArea;

        $doNowArea->user_id = $request->user_id;
        $doNowArea->class_id = $classroom->id;
        $doNowArea->description = $request->description;
        $doNowArea->urlDoNow = $request->urlDoNow;
        $doNowArea->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DoNowArea $doNowArea)
    {
        return new DoNowResource($doNowArea);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, DoNowArea $doNowArea)
    {
        $this->validate($request, [
            'description' => 'required',
            'urlDoNow' => 'url',
        ]);

        $doNowArea->update($request->only(['description', 'urlDoNow']));

        return new DoNowResource($doNowArea);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoNowArea $doNowArea)
    {
        $doNowArea->delete();

        return response()->json(null, 204);
    }
}
