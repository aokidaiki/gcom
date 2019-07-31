<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Games;
use App\comment;
use Auth;
use App\Http\Requests\UserRequest;
use DB;
use App\Http\CommentController;


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
    public function create(User $user)
    {
        return view('users.create', [
            'user' => $user,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Games $games ,Comment $comments)
    {
        
        // $comments = Comment::select('comment')->where('board_user_id',$user->id)->get();
        //select句でやると、commentテーブルのcommentのみしか取れない
        $login_user =Auth::user();

        $following_users = $user->followings()->get();
        $be_followed_users = $user->followers()->get();
        $login_id = Auth::id();
        $follow_users_number = count($following_users);
        $be_followed_users_number = count($be_followed_users);

        $followingeachother = DB::table('followables')
        ->where('user_id', $login_id)
        ->where('followable_id', $user->id)
        ->first();

        $comments = Comment::where('board_user_id', $user->id)->get();
        $games = Games::select('games_title')->where('id',$user->games_id)->get();
        $user_id = User::findOrFail($user->id);
        return view('users.show', [
            'id' => $user_id->id,
            'name' => $user_id->name, 
            'comment' => $user_id->comment,
            'gamelist' => $user_id->gamelist,
            'games_id' => $user_id->games_id,
            'icon_image' => $user_id->icon_image, 
            'background_image' => $user_id->background_image,
            'twitter_url' => $user_id->twitter_url,
            'board_name' => $user_id->board_name,
            'board_comment' => $user_id->board_comment,
            'user' => $user_id,
            'games' => $games,
            'comments' => $comments,
            'following_users' => $following_users,
            'be_followed_users' => $be_followed_users,
            'follow_users_number' => $follow_users_number,
            'be_followed_users_number' => $be_followed_users_number,
            'followingeachother' => $followingeachother,
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
        if($user_id->id == Auth::user()->id){
        return view('users.edit', [
            'id' => $user_id->id,
            'name' => $user_id->name, 
            'comment' => $user_id->comment,
            'gamelist' => $user_id->gamelist,
            'games_id' => $user_id->games_id,
            'icon_image' => $user_id->icon_image, 
            'background_image' => $user_id->background_image,
            'twitter_url' => $user_id->twitter_url,
            'board_name' => $user_id->board_name,
            'board_comment' => $user_id->board_comment,
            'user' => $user_id,
        ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $originalImg = $request->icon_image;
        $user->fill($request->all()); //fill関数に入れてる
        if($user->isDirty("board_name")) {
            Comment::where('board_user_id', $user->id)->delete();
        }
        $user->save(); //データベースに保存
        if(!empty($originalImg)) {
            $filePath = $originalImg->store('public');
            $user->icon_image = str_replace('public/', '', $filePath);
            $user->save();
        }
        // $user->fill($request->all());
        // $user->save();
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

    public function follow(User $user){
        
        $login_user =Auth::user();
        $login_user->follow($user);

        $login_id = Auth::id();
        $followingeachother = DB::table('followables')
        ->where('user_id', $login_id)
        ->where('followable_id', $user->id)
        ->first();

        $comments = Comment::where('board_user_id', $user->id)->get();
        $games = Games::select('games_title')->where('id',$user->games_id)->get();
        $user_id = User::findOrFail($user->id);
        $following_users = $user->followings()->get();
        $be_followed_users = $user->followers()->get();

        $follow_users_number = count($following_users);
        $be_followed_users_number = count($be_followed_users);


        if(!empty($followingeachother)){
            return view('users.show',[
                'user' => $user,
                'followingeachother' => $followingeachother,
                'id' => $user_id->id,
                'name' => $user_id->name, 
                'comment' => $user_id->comment,
                'gamelist' => $user_id->gamelist,
                'games_id' => $user_id->games_id,
                'icon_image' => $user_id->icon_image, 
                'background_image' => $user_id->background_image,
                'twitter_url' => $user_id->twitter_url,
                'board_name' => $user_id->board_name,
                'board_comment' => $user_id->board_comment,
                'games' => $games,
                'comments' => $comments,
                'following_users' => $following_users,
                'be_followed_users' => $be_followed_users,
                'follow_users_number' => $follow_users_number,
                'be_followed_users_number' => $be_followed_users_number,
                ]);
        }
        return view('users.show',[
            'user' => $user
        ]);
    }
    public function unfollow(User $user){
        $login_user =Auth::user();
        $login_user->unfollow($user);

        $user_id = User::findOrFail($user->id);
        $games = Games::select('games_title')->where('id',$user->games_id)->get();
        $comments = Comment::where('board_user_id', $user->id)->get();

        $following_users = $user->followings()->get();
        $be_followed_users = $user->followers()->get();

        $follow_users_number = count($following_users);
        $be_followed_users_number = count($be_followed_users);


        return view('users.show',[
            'user' => $user,
            'id' => $user_id->id,
            'name' => $user_id->name, 
            'comment' => $user_id->comment,
            'gamelist' => $user_id->gamelist,
            'games_id' => $user_id->games_id,
            'icon_image' => $user_id->icon_image, 
            'background_image' => $user_id->background_image,
            'twitter_url' => $user_id->twitter_url,
            'board_name' => $user_id->board_name,
            'board_comment' => $user_id->board_comment,
            'games' => $games,
            'comments' => $comments,
            'following_users' => $following_users,
            'be_followed_users' => $be_followed_users,
            'follow_users_number' => $follow_users_number,
            'be_followed_users_number' => $be_followed_users_number,
        ]);
    }
    public function following(User $user){
        $following_users = $user->followings()->get();
        $be_followed_users = $user->followers()->get();

        $follow_users_number = count($following_users);
        $be_followed_users_number = count($be_followed_users);
        $user_id = User::findOrFail($user->id);
        $games = Games::select('games_title')->where('id',$user->games_id)->get();
        $comments = Comment::where('board_user_id', $user->id)->get();


        return view('users.following',[
            'user' => $user,
            'id' => $user_id->id,
            'name' => $user_id->name, 
            'comment' => $user_id->comment,
            'gamelist' => $user_id->gamelist,
            'games_id' => $user_id->games_id,
            'icon_image' => $user_id->icon_image, 
            'background_image' => $user_id->background_image,
            'twitter_url' => $user_id->twitter_url,
            'board_name' => $user_id->board_name,
            'board_comment' => $user_id->board_comment,
            'games' => $games,
            'comments' => $comments,
            'following_users' => $following_users,
            'be_followed_users' => $be_followed_users,
            'follow_users_number' => $follow_users_number,
            'be_followed_users_number' => $be_followed_users_number,
        ]);
    }

}
