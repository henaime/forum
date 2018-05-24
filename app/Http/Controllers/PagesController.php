<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;
use DB;
use Illuminate\Database\Eloquent\Collection;

class PagesController extends Controller
{
    public function index(){
    	$posts=post::orderBy('id_p','asc')->paginate(3);
        $users=DB::table('users')->get();
        $tab = ['posts'=>$posts,'users'=>$users,];
        return view('pages.index')->with('tab',$tab);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }
    public function profile(){
        return view('pages.profile');
    }

}
