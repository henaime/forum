<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\like;
use DB;

class likesController extends Controller
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
    public function store(Request $request)
    {
        $like = new Like;
        $likes = DB::table('likes')->get();
        $like->idpost = $request->input('id');
        $like->iduser = auth()->user()->id;
        //check if the current user has already like this post
        // if yes delete it from likes table
        foreach ($likes as $jaime) {
            if($like->iduser==$jaime->iduser and $like->idpost==$jaime->idpost ){
                DB::table('likes')->where([['idpost', '=', $like->idpost],['iduser','=',$like->iduser],])->delete();
                return redirect('/posts/'.$request->input('id'));
            }
        }
        //else store the informations
        $like->save();
        return redirect('/posts/'.$request->input('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
}
