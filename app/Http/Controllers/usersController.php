<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\app\User;
use DB;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_name = auth()->user()->name;
        $user_email = auth()->user()->email;
        $user_id = auth()->user()->id;
        $posts = DB::table('posts')->where('id_user','=',$user_id)->get();
        $user=['name'=>$user_name,'email'=>$user_email,'posts'=>$posts,];
        return view('pages.profile')->with('user',$user);
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
    public function show($id)
    {
        $u = DB::table('users')->where('id','=',$id)->get();
        $posts = DB::table('posts')->where('id_user','=',$id)->get();
        $user=['user'=>$u,'posts'=>$posts,'id'=>$id,];
        return view('pages.profile1')->with('user',$user);
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
    public function destroy($id)
    {
        //
    }

     public function profile($id)
    {
        //
    }
}
