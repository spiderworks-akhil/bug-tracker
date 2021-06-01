<?php

namespace App\Widgets;

use App\Models\Site;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class AdminMenu extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $user = Auth::user();

        if($user){
            $sites = Site::where('user_id',$user->id)->get();
        }else{
            $sites = [];
        }

        return view('widgets.admin_menu', [
            'config' => $this->config,
            'sites' => $sites
        ]);
    }
}
