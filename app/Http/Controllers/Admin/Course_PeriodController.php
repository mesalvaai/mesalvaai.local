<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Course_Period;

class Course_PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Course $course)
    {
        //
        $validator = \DB::select('select count(*) as aggregate 
            from course_period
            where course_id = ' . $course->id .' and '.'period_id = ' . $request->input('period_id'));

        if($validator[0]->aggregate >= 1)
        {

          return redirect()->back()->with('erros_period', 'periodo já cadastrada')->with('period_id',$request->input('period_id'));
        }
        else
        {
        $course_period = new Course_Period($request->all());
        $course_period->course_id = $course->id;
        $course_period->save();
        return redirect()->route('courses.show', $course->id)
        ->with('status', 'Periodo salvo com sucesso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_period)
    {
        //
         Course_Period::find($course_period)->delete();
         return back()->with('status', 'Periodo excluída com sucesso!');
    }
}
