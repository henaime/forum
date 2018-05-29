<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
<<<<<<< HEAD
use DB;  
=======
use DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Validator;
>>>>>>> f84cd453979465ea8f697781f19a4548e9e4b2dd

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->valdiate($request,[
            'title' => 'required',
            'content' => 'required',
            'photo' => 'image|nullable|max:1999',
        ]);
    */

          // Handle File Upload
        if($request->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= time().'.'.$extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('/public', $fileNameToStore);
        } else {
            $fileNameToStore = 'post.jpg';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->id_user = auth()->user()->id;
        $post->contenu = $request->input('content');
        $post->img = $fileNameToStore;


        $post->save();
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=post::all();
        $users=user::all();
        $comments=DB::table('comments')->where('id_po','=',$id)->get();
        $nbr_comment=DB::table('comments')->where('id_po','=',$id)->groupBy('id_po')->count();
        $nbr_likes=DB::table('likes')->where('idpost','=',$id)->groupBy('idpost')->count();
            foreach ($posts as $post) {
               if($post->id_p==$id){
                    $p=$post;
                    break;
               }
            }
            foreach ($users as $user) {
               if($user->id==$p->id_user){
                    $u=$user;
                    break;
               }
            }
        $tab = ['post'=>$p,'user'=>$u,'comments'=>$comments,'nbr'=>$nbr_comment,'nbr_likes'=>$nbr_likes,'users'=>$users,];
        return view('pages.show')->with('tab',$tab);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $posts = DB::table('posts')->get();
        foreach ($posts as $p) {
               if($p->id_p==$id){
                    $post=$p;
               }
         }
        return view('pages.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {/*
        $posts = DB::table('posts')->get();
        foreach ($posts as $p) {
               if($p->id_p==$id){
                    $post=$p;
               }
         }

        $post->title = $request->input('title');
        $post->contenu = $request->input('content');
        $post->img = 'photo.jpg';
        $post->save();
        return redirect('/profile');
        return redirect('/profile');
      */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $message='votre post a été supprimer';
        $id_post=$id;
        $id_user=auth()->user()->id;
        DB::table('likes')->where('idpost', '=', $id_post)->delete();
        DB::table('comments')->where('id_po', '=', $id_post)->delete();
        DB::table('posts')->where([['id_p', '=', $id_post],['id_user','=',$id_user],])->delete();
        
        
        return redirect('/profile');
    }

}
