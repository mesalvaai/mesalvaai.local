<?php

namespace App\Http\Controllers\Admin;
use App\Reward;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rewards = User::join('rewards' , 'users.id' , '=' , 'rewards.user_id' )->get();

        return view('admins.reward.index', compact('rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.reward.create');
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
        try 
        {

            $reward = new Reward($request->all());
            $reward->save();

            return redirect()->route('rewards.index', $reward->id)
            ->with('status', 'Recompensa cadastrada com sucesso');


        } catch (\Exception $e) 
        {

            return redirect()->route('rewards.index', $reward->id)
            ->with('status', 'ERRO: Recompensa não cadastrada');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function show(Reward $reward)
    {
        //
        try 
        {


           $result = Reward::join('users' , 'rewards.user_id' , '=' , 'users.id' )->where('rewards.id', '=', $reward->id)->select('users.name', 'rewards.*')->first();

           $result->id = $reward->id;
           $reward = $result;  
           return view('admins.reward.show', compact('reward'));
        } 
        catch (\Exception $e) 
        {
           return redirect()->route('rewards.index', $reward->id)
            ->with('status', 'ERRO: ao visualizar');
        }
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        //
        return view('admins.reward.edit', compact('reward'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reward $reward)
    {
        //
        $reward->update($request->all());
        return redirect()->route('rewards.index', $reward->id)
        ->with('status', 'Recompensa editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        //

       $reward->delete();

       return back()->with('status', 'Recompensa excluída com sucesso');
   }
}