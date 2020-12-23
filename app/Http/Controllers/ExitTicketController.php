<?php

namespace App\Http\Controllers;

use App\Models\ExitTicketArea;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Resources\ExitTicketResource;

class ExitTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ExitTicketResource::collection(ExitTicketArea::latest()->paginate(16));
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
            'url-exit-ticket' => 'url',
        ]);

        $exitTicketArea = new ExitTicketArea;

        $exitTicketArea->user_id = $request->user_id;
        $exitTicketArea->class_id = $classroom->id;
        $exitTicketArea->description = $request->description;
        $exitTicketArea->urlExitTicket = $request->urlExitTicket;
        $exitTicketArea->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExitTicketArea $exitTicketArea)
    {
        return new ExitTicketResource($exitTicketArea);
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
    public function update(Request $request, ExitTicketArea $exitTicketArea)
    {
        $this->validate($request, [
            'description' => 'required',
            'urlExitTicket' => 'url',
        ]);

        $exitTicketArea->update($request->only(['description', 'urlExitTicket']));

        return new ExitTicketResource($exitTicketArea);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExitTicketArea $exitTicketArea)
    {
        $exitTicketArea->delete();

        return response()->json(null, 204);
    }
}
