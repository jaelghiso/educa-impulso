<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    public function index()
    {
        return CourseResource::collection(Course::latest()->paginate(16));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $course = new Course;

        $course->user_id =  $request->user_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->save();

        return new CourseResource($course);
    }

    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    public function edit(Course $course)
    {
    }

    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $course->update($request->only(['title', 'description']));

        return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }
}
