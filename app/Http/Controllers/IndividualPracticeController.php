<?php

namespace App\Http\Controllers;

use App\Models\IndividualPracticeArea;
use App\Models\Classroom;
use App\Http\Resources\IndividualPracticeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndividualPracticeController extends Controller
{
    public function index()
    {
        return IndividualPracticeResource::collection(IndividualPracticeArea::latest()->paginate(16));
    }

    public function store(Request $request, Classroom $classroom)
    {
        $this->validate($request, [

            'user_id' => 'required',
            'title' => 'required',
            'individualPracticeText' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'highlightList' => 'required'
        ]);

        $individualPractice = new IndividualPracticeArea;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::slug($request->title, '-') . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/individual-practice');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $individualPractice->image = $name;
        }

        $individualPractice->user_id = $request->user_id;
        $individualPractice->class_id = $classroom->id;
        $individualPractice->title = $request->title;
        $individualPractice->individualPracticeText = $request->individualPracticeText;
        $individualPractice->highlightList = $request->highlightList;
        $individualPractice->save();

        return new IndividualPracticeResource($individualPractice);
    }

    public function show(IndividualPracticeArea $individualPractice)
    {
        return new IndividualPracticeResource($individualPractice);
    }

    public function update(Request $request, IndividualPracticeArea $individualPractice)
    {
        $this->validate($request, [
            'title' => 'required',
            'individualPracticeText' => 'required',
            'highlightList' => 'url'
        ]);

        $individualPractice->update($request->only(['title', 'individualPracticeText', 'highlightList']));

        return new IndividualPracticeResource($individualPractice);
    }

    public function destroy(IndividualPracticeArea $individualPractice)
    {
        $individualPractice->delete();

        return response()->json(null, 204);
    }
}
