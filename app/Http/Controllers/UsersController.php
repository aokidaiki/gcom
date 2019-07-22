<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Games;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user_id = User::findOrFail($user->id);
        
        return view('users.index', [
            'name' => $user_id->name, 
            'comment' => $user_id->comment,
            'gamelist' => $user_id->gamelist,
            'games_id' => $user_id->games_id,
            'icon image' => $user_id->icon_image, 
            'background_image' => $user_id->background_image,
            'twitter_url' => $user_id->twitter_url,
            'board_name' => $user_id->board_name,
            'board_comment' => $user_id->board_comment,
        ]);
        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user_id = User::findOrFail($user->id);
        return view('users.show', [
            'id' => $user_id->id,
            'name' => $user_id->name, 
            'comment' => $user_id->comment,
            'gamelist' => $user_id->gamelist,
            'games_id' => $user_id->games_id,
            'icon image' => $user_id->icon_image, 
            'background_image' => $user_id->background_image,
            'twitter_url' => $user_id->twitter_url,
            'board_name' => $user_id->board_name,
            'board_comment' => $user_id->board_comment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user_id = User::findOrFail($user->id);
        return view('users.edit', [
            'id' => $user_id->id,
            'name' => $user_id->name, 
            'comment' => $user_id->comment,
            'gamelist' => $user_id->gamelist,
            'games_id' => $user_id->games_id,
            'icon image' => $user_id->icon_image, 
            'background_image' => $user_id->background_image,
            'twitter_url' => $user_id->twitter_url,
            'board_name' => $user_id->board_name,
            'board_comment' => $user_id->board_comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
            $user->fill($request->all());

            $user->save();
             return redirect("/users/{$user->id}");
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
