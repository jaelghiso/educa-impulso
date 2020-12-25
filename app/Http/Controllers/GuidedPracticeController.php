<?php

namespace App\Http\Controllers;

use App\Models\GuidedPracticeArea;
use App\Models\Classroom;
use App\Http\Resources\GuidedPracticeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuidedPracticeController extends Controller
{
    public function index()
    {
        return GuidedPracticeResource::collection(GuidedPracticeArea::latest()->paginate(16));
    }

    public function store(Request $request, Classroom $classroom)
    {
        $this->validate($request, [

            'user_id' => 'required',
            'title' => 'required',
            'guidedPracticeText' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'urlVideoGuided' => 'url'
        ]);

        $guidedPractice = new GuidedPracticeArea;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::slug($request->title, '-') . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/guided-practice');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $guidedPractice->image = $name;
        }

        $guidedPractice->user_id = $request->user_id;
        $guidedPractice->class_id = $classroom->id;
        $guidedPractice->title = $request->title;
        $guidedPractice->guidedPracticeText = $request->guidedPracticeText;
        $guidedPractice->urlVideoGuided = $request->urlVideoGuided;
        $guidedPractice->save();

        return new GuidedPracticeResource($guidedPractice);
    }

    public function show(GuidedPracticeArea $guidedPractice)
    {
        return new GuidedPracticeResource($guidedPractice);
    }

    public function update(Request $request, GuidedPracticeArea $guidedPractice)
    {
        $this->validate($request, [
            'title' => 'required',
            'guidedPracticeText' => 'required',
            'urlVideoGuided' => 'url'
        ]);

        $guidedPractice->update($request->only(['title', 'guidedPracticeText', 'urlVideoGuided']));

        return new GuidedPracticeResource($guidedPractice);
    }

    public function destroy(GuidedPracticeArea $guidedPractice)
    {
        $guidedPractice->delete();

        return response()->json(null, 204);
    }
}
