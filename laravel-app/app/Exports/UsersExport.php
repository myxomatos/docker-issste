<?php

namespace App\Exports;

use App\Models\Actividades;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function view(): View
    {
        $user = Auth::User();
        return view('reportes.index',[

            'actividades' => Actividades::where('user_id',$user->id)->get()
//            'users' => User::get()
        ]);
        //
    }
}
