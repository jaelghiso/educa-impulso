<?php

namespace App\Http\Controllers;

use App\Models\BigWordsArea;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Resources\BigWordsAreaResource;


class BigWordsAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BigWordsAreaResource::collection(BigWordsArea::latest()->paginate(16));
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

        $bigWordsArea = new BigWordsArea;

        $bigWordsArea->user_id = $request->user_id;
        $bigWordsArea->class_id = $classroom->id;
        $bigWordsArea->description = $request->description;
        $bigWordsArea->save();

        return new BigWordsAreaResource($bigWordsArea);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BigWordsArea $bigWordsArea)
    {
        return new BigWordsAreaResource($bigWordsArea);
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
    public function update(Request $request, BigWordsArea $bigWordsArea)
    {
        $this->validate($request, ['description' => 'required']);

        $bigWordsArea->update($request->only(['description']));

        return new BigWordsAreaResource($bigWordsArea);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BigWordsArea $bigWordsArea)
    {
        $bigWordsArea->delete();

        return response()->json(null, 204);
    }
}
