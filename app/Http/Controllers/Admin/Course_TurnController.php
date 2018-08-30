<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Course_Turn;
use App\Turn;

class Course_TurnController extends Controller
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
        
           $validator = \DB::select('select count(*) as aggregate 
            from course_turn
            where course_turn.course_id = ' . $course->id .' and '.'course_turn.turn_id = ' . $request->input('turn_id'));

            if($validator[0]->aggregate >= 1)
            {
                
              return redirect()->back()->with('erros_turn', 'turno já cadastrado')->with('turn_id',$request->input('turn_id'));
            }
          else
          {
            $Course_Turn = new Course_Turn($request->all());
            $Course_Turn->course_id = $course->id;
            $Course_Turn->save();
            return redirect()->route('courses.show', $course->id)
            ->with('status', 'Turno salvo com sucesso');
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
    public function destroy($course_turn)
    {
        //
        Course_Turn::find($course_turn)->delete();
        return back()->with('status', 'Turno excluída com sucesso!');
        
    }
} 
