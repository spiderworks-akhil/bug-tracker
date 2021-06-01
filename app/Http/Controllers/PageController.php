<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function login(){
        return view('client.pages.login');
    }

    public function attempt_login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard($site=null){
        if($site){
            $bugs = Bug::where('site_id',decrypt($site))->where('status','open');
        }else{
            $bugs = Bug::where('status','open');
        }
        $bugs = $bugs->orderby('id','DESC')->get();
        return view('client.pages.dashboard',compact('bugs'));
    }

    public function get_bug(Request $request){
        $obj = Bug::find(decrypt($request->id));
        $view = view('client.pages.dynamic_content.bug_window',compact('obj'))->render();
        return response()->json(['html'=>$view]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}
