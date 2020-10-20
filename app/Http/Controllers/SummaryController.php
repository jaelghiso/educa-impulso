<?php

namespace App\Http\Controllers;

use App\Models\Summary;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\SummaryResource;


class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SummaryResource::collection(Summary::latest()->paginate(16));
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $summary = new Summary;

        $summary->user_id = $request->user_id;
        $summary->course_id = $request->course_id;
        $summary->title = $request->title;
        $summary->description = $request->description;
        $summary->save();

        return new SummaryResource($summary);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function show(Summary $summary)
    {
        return new SummaryResource($summary);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function edit(Summary $summary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Summary $summary)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $summary->update($request->only(['title', 'description']));

        return new SummaryResource($summary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Summary $summary)
    {
        $summary->delete();

        return response()->json(null, 204);
    }
}
