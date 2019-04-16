<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Course_Modality;

class Course_ModalityController extends Controller
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
    public function store(Request $request,Course $course)
    {
        //
        $validator = \DB::select('select count(*) as aggregate 
            from course_modality
            where course_modality.course_id = ' . $course->id .' and '.'course_modality.modality_id = ' . $request->input('modality_id'));

        if($validator[0]->aggregate >= 1)
        {

          return redirect()->back()->with('erros_modality', 'modalidade já cadastrada')->with('modality_id',$request->input('modality_id'));
        }
        else
        {

        $course_modality = new Course_Modality($request->all());
        $course_modality->course_id = $course->id;
        $course_modality->save();
        return redirect()->route('courses.show', $course->id)
        ->with('status', 'Modalidade salva com sucesso');
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
    public function destroy($course_modality)
    {
        //
        Course_Modality::find($course_modality)->delete();
        return back()->with('status', 'Modalidade excluída com sucesso!');
    }
}
