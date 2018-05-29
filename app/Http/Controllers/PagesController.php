<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;
use App\like;
use App\comment;
use DB;
use Illuminate\Database\Eloquent\Collection;

class pagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::orderBy('id_p','asc')->paginate(3);
        $users=DB::table('users')->get();

       if($posts[0]!=null)
        {
            foreach ($posts as $post) {
                $nbr_comments[$post->id_p]=DB::table('comments')->where('id_po','=',$post->id_p)->groupBy('id_po')->count();
                $nbr_likes[$post->id_p]=DB::table('likes')->where('idpost','=',$post->id_p)->groupBy('idpost')->count();
            }
        


        $tab = ['posts'=>$posts,'users'=>$users,'nbr_likes'=>$nbr_likes,'nbr_comments'=>$nbr_comments,];
        return view('pages.index')->with('tab',$tab); 
        }else{
           $tab=['posts'=>null];
           return view('pages.index')->with('tab',$tab);  
        }
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
                return redirect('/');
            }
        }
        //else store the informations
        $like->save();
        return redirect('/');
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
    public function destroy($id)
    {
        //
    }

    public function about(){
        $title = 'About the project';
        return view('pages.about')->with('title', $title);
    }
}

