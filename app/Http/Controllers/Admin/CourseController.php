<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Area;
use App\Level;
use App\Turn;
use App\Modality;
use App\Period;



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
        $course_turns = \DB::table('turns')->join('course_turn', 'turns.id', '=', 'course_turn.turn_id')->select('*')->where('course_turn.course_id',$course->id)->orderBy('turns.id','ASC')->get();

        $course_modalities = \DB::table('modalities')->join('course_modality', 'modalities.id', '=', 'course_modality.modality_id')->select('*')->where('course_modality.course_id',$course->id)->orderBy('modalities.name','ASC')->get();

         $course_periods = \DB::table('periods')->join('course_period', 'periods.id', '=', 'course_period.period_id')->select('*')->where('course_period.course_id',$course->id)->orderBy('periods.name','ASC')->get();
         

        $turn = Turn::orderBy('name', 'ASC')->pluck('name', 'id');
        $modality = Modality::orderBy('name', 'ASC')->pluck('name', 'id');
        $period = Period::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admins.courses.show',compact('course_periods','period','course_modalities','modality','course_turns','course','turn'));
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
