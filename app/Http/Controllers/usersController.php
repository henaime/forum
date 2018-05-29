<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
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
        $user_id = auth()->user()->id;
        $user=User::findOrFail($user_id);
        $posts=Post::where('id_user',$user_id)->get();
        return view('pages.profile',['user'=>$user,'posts'=>$posts]);
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
        $user=User::findOrFail($id);
        return view('pages.Changeprofile',compact('user'));
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
        $user=User::findOrFail($id);

    //traitement d'image
        if ($request->hasFile('ProImage')) {
            if($request->file('ProImage')->isValid()) {
                    $file = $request->file('ProImage');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();

                    $request->file('ProImage')->move("Images/Profile/", $name);
                    $path1='Images/Profile/'.$name;
            }
        }
        if ($request->hasFile('Cover')) {
            if($request->file('Cover')->isValid()) {

                    $file = $request->file('Cover');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();

                    $request->file('Cover')->move("Images/covers/", $name);
                    $path2='Images/covers/'.$name;
            }
        }
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->image=$path1;
        $user->cover=$path2;
        $user->save();
        return redirect('/profile');
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
