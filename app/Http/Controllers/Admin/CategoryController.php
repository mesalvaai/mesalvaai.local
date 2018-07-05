<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();
        return view('admins.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.categories.create');
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
            'name.unique' => 'Já existe uma categoria com este nome!',
            'max' => 'Valor máximo de caracteres excedido!',
        ];

        $validator = \Validator::make($request->all(), [

            'name' => 'bail|unique:categories|max:255',
            'description' => 'max:255',

        ], $messages);

        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();  


        }else{
         $category = Category::create($request->all());

         return redirect()->route('categories.edit', $category->id)
         ->with('status', 'Categoria cadastrada com sucesso!');
     }

 }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('admins.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admins.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       $messages = [
        'name.unique' => 'Já existe uma categoria com este nome!',
        'max' => 'Valor máximo de caracteres excedido!',
    ];

    $validator = \Validator::make($request->all(), [

        'name' => 'bail|unique:categories|max:255',
        'description' => 'max:255',

    ], $messages);

    if ($validator->fails()) {

      $categorrySelect = Category::where('name', $request->input('name'))->first();


      if($categorrySelect != null){


        if($categorrySelect->name == $request->input('name') && $categorrySelect->id !=  $category->id) {


          return redirect()->back()
          ->withErrors($validator)
          ->withInput();  

      }
  }else {
    return redirect()->back()
    ->withErrors($validator)
    ->withInput();  
}

}
 $category->update($request->all());
return redirect()->route('categories.edit', $category->id)
->with('status', 'Categoria alterada com sucesso!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        return back()->with('status', 'A categoria foi excluída!');
    }
}
