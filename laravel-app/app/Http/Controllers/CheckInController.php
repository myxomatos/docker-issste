<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckInController extends Controller
{
    public function createCheckIn(){
        $user = Auth::User();
        DB::table('users')
            ->where('check_in', 0)
            ->where('id',$user->id)
            ->update(['entrada' => $current_date_time = Carbon::now()->toDateTimeString()]);

        DB::table('users')
            ->where('id',$user->id)
            ->update(['check_in' => 1]);

        return view ('check_in.check_in',compact('user'));

    }

    public function createCheckOut(){

        $user = Auth::User();
        DB::table('users')
            ->where('check_in', 1)
            ->where('id',$user->id)
            ->update(['salida' => $current_date_time = Carbon::now()->toDateTimeString()]);

        DB::table('users')
            ->where('id',$user->id)
            ->update(['check_in' => 0]);

        return view ('check_in.check_out',compact('user'));

    }


    public function horarios(){

        $user = Auth::User();


        return view ('check_in.index',compact('user'));

    }


}