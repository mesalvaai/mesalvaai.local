<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Area;
use App\Level;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $courses = Course::Paginate();
       return view('admins.courses.index',compact('courses'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $area = Area::orderBy('name', 'ASC')->pluck('name', 'id');
        $nivel = Level::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admins.courses.create', compact('area','nivel'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $slug = str_slug($request->input('name'));
        $course = new Course($request->all());
        $course->slug = $slug;

        $course->save();

        return redirect()->route('courses.edit', $course->id)
        ->with('status', 'salva com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        return view('admins.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
       $area = Area::orderBy('name', 'ASC')->pluck('name', 'id');
       $nivel = Level::orderBy('name', 'ASC')->pluck('name', 'id');
       return view('admins.courses.edit', compact('area','nivel','course'));
       
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $course->update($request->all());
        return redirect()->route('courses.index', $course->id)
        ->with('status', 'editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();

        return back()->with('status', 'excluída com sucesso');
    }
}
