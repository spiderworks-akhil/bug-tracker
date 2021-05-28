<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BugController extends Controller
{
    public function register(Request $request){

        $email = $request->email;
        $root_url = $request->root_url;

        if(strpos($email,'@spiderworks.in') !== false){
        }else{
            return response([
                'status' => false,
                'message' => "you don't have access to do the task"
            ]);
        }

        $user = User::where('email',$email)->first();
        if(!$user){
            $user = new User();
            $arr = explode('@',$email);
            $user->name = $arr[0];
            $user->email = $email;
            $user->password = Hash::make($arr[0].'-2215');
            $user->save();
        }

        $site = Site::where('url',$root_url)->first();

        if(!$site){
            $site = new Site();
            $site->name = $root_url;
            $site->url = $root_url;
            $site->user_id = $user->id;
            $site->save();
        }

        $bug = new Bug();
        $bug->url = $request->bug_url;
        $bug->name = $request->name;
        $bug->error_code = $request->error_code;
        $bug->message = $request->message;
        $bug->status = 'Open';
        $bug->user_id = $user->id;
        $bug->site_id = $site->id;
        $bug->save();

        return response([
            'status' => true,
            'message' => 'Bug registered'
        ]);

    }
}
