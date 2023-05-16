<?php

namespace App\Providers;

use App\Models\Hospitales;
use App\Models\Incidencias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewsComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->notify();
    }

    public function notify(){

        view()->composer(['partials.header_home'], function ($view) {
            $usuario = Auth::User();
            $hospitales = Hospitales::where('subcordinador_id',$usuario->id)->pluck('id')->toArray();
//            $total_incidencias = Incidencias::where('hospital_id',$usuario->hospital_id)->where('status','pendiente')->count();
            $notificacion = Incidencias::whereIn('hospital_id',$hospitales)
                ->where('status','pendiente')
                ->orderBy('id','desc')
                ->get();
            $view->with([
                'notificacion' => $notificacion,
//                'total_incidencias' => $total_incidencias,
            ]);
        });
    }
}