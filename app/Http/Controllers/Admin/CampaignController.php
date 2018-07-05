<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Category;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $campaigns = Campaign::paginate();

      return view('admins.campaigns.index', compact('campaigns'));
    }

/*    public static function getStudents($id){
        return Student::where('id','=',$id)->get();
    }
*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $students = Student::orderBy('name', 'ASC')->pluck('name', 'id');
      $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

      return view('admins.campaigns.create', compact('students', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $messages = [
      'required' => 'Este campo é obrigatório!',
      'title.unique' => 'Já existe uma campanha com este título!',
      'max' => 'Valor máximo de caracteres excedido!',
    ];

    $validator = \Validator::make($request->all(), [
      'title' => 'bail|unique:campaigns|max:255',
      'goal' => 'required',
      'funds_received' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'description' => 'required',
      'location' => 'bail|required|max:255',
      'status' =>'bail|required|max:1',
      'student_id' => 'required', 
      'category_id' => 'required',
    ], $messages);

    if ($validator->fails()){

      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  
    }

    $campaign = Campaign::create($request->all());

    return redirect()->route('campaigns.edit', $campaign->id)
    ->with('status', 'Campanha salva com sucesso');

  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
      $studentName = \DB::table('students')->where('id', $campaign->student_id)->value('name');
      $categoryName = \DB::table('categories')->where('id', $campaign->category_id)->value('name');

      return view ('admins.campaigns.show',compact('campaign', 'studentName', 'categoryName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
     $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
     $students = Student::orderBy('name', 'ASC')->pluck('name', 'id');

     return view('admins.campaigns.edit', compact('campaign' ,'categories','students'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
     $messages = [
      'required' => 'Este campo é obrigatório!',
      'title.unique' => 'Já existe uma campanha com este título!',
      'max' => 'Valor máximo de caracteres excedido!',
    ];

    $validator = \Validator::make($request->all(), [
      'title' => 'bail|unique:campaigns|max:255',
      'goal' => 'required',
      'funds_received' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'description' => 'required',
      'location' => 'bail|required|max:255',
      'status' =>'bail|required|max:1',
      'student_id' => 'required', 
      'category_id' => 'required',
    ], $messages);

    if ($validator->fails()) {

      $campaignSelect = Campaign::where('title', $request->input('title'))->first();

      if($campaignSelect != null){

        if($campaignSelect->title == $request->input('title') && $campaign->id !=  $campaignSelect->id) {

          return redirect()->back()
          ->withErrors($validator)
          ->withInput(); 
        }
      }else{
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }
    }

    $campaign->update($request->all());

    return redirect()->route('campaigns.edit', $campaign->id)
    ->with('status', 'Campanhas alterada com sucesso');

  }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
      $campaign->delete();

      return back()->with('status', 'A campanha foi excluído');
    }
  }
