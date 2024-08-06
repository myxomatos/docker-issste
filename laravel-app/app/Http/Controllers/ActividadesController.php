<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\Reportes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ActividadesController extends Controller
{
    public function showActividades($id){
        $user = Auth::User();
        $actividades = Actividades::find($id);


        return view ('showActividades',compact('actividades', 'user'));
    }

    public function createActividades(){
        $user = Auth::User();

        return view ('createActividades',compact('user'));
    }

    public function storeActividades(Request $request){
        $date = Carbon::now()->format('Y-m-d');
        $usuario = Auth::User();
        $actividad = new Actividades();
        $actividad->nombre = $request->nombre;
        $actividad->status = $request->status;
        $actividad->descripcion_actividad = $request->descripcion_actividad;
        $actividad->descripcion_subactividad = $request->descripcion_subactividad;
        $actividad->notas = $request->notas;
        $actividad->user_id = $request->nombre_usuario;
        $actividad->cantidad = $request->cantidad;
        $actividad->hospital_id = $usuario->hospital_id;
        $actividad->fecha  = $current_date_time = Carbon::now()->toDate();
        $date = Carbon::now()->format('Y-m-d');
        $actividad->save();
        $reportes = Reportes::firstOrNew([
            'nombre' => $request->nombre,
            'status' => $request->status,
            'descripcion_actividad' => $request->descripcion_actividad,
            'descripcion_subactividad' => $request->descripcion_subactividad,
            'fecha' => $date,
            'user_id' => $request->nombre_usuario,
            'hospital_id' => $usuario->hospital_id,
        ]);

        $reportes->cantidad++;
        $reportes->save();

        return redirect()->route("homeIndexPanel")->with("success");
    }

    public function updateActividades(Request $request, $id){
        $actividades = Actividades::find($id);
        $actividades->status = $request->status;
        $actividades->save();

        return redirect()->route("homeIndexPanel")->with("success");
    }

    public function reporteDate($inicio = null, $fin = null)
    {
        $usuario = Auth::User();
        $now = Carbon::now();
        if ($inicio == null){
            $fin = $now->subDays(-1)->format('Y-m-d');
            $inicio = $now->subDays()->format('Y-m-d');
        }
        $now = Carbon::now()->format('Y-m-d');
        if ($usuario->rol== 'enlace'){
        $actividades = DB::table('reportes')
            ->select('reportes.nombre','reportes.fecha','reportes.cantidad','reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
            ->where('fecha','>=',$inicio)
            ->where('fecha','<=',$fin)
            ->where('user_id',$usuario->id)
            ->get();
        $incidencias = DB::table('incidencias')
            ->select('incidencias.nombre','hospitales.nombre as hospital','users.rol','incidencias.status as status','incidencia_historico.asignacion','users.name','users.apellido','incidencia_historico.comentario')
            ->join('incidencia_historico','incidencias.id','=','incidencia_historico.incidencia_id')
            ->join('users', 'users.id', '=', 'incidencias.user_id')
            ->join('hospitales', 'hospitales.id', '=', 'incidencias.hospital_id')
            ->where('incidencias.created_at','>=',$inicio)
            ->where('incidencias.created_at','<=',$fin)
            ->where('users.id',$usuario->id)
            ->get();
//        $actividades = Actividades::where('created_at','>=',$inicio)
//            ->where('created_at','<=',$fin)
//           ->where('user_id',$usuario->id)
//            ->distinct('created_at')
//            ->get();
        }elseif($usuario->rol== 'subcoordinador'){
            $actividades = DB::table('reportes')
            ->select('reportes.nombre','reportes.fecha','reportes.cantidad','reportes.descripcion_actividad','users.name as enlace','users.apellido as apellidoEnlace','hospitales.nombre as hospital','reportes.descripcion_subactividad')
                ->join('users', 'users.id', '=', 'reportes.user_id')
                ->join('hospitales', 'hospitales.id', '=', 'reportes.hospital_id')
                ->where('fecha','>=',$inicio)
                ->where('fecha','<=',$fin)
                ->where('users.subcordinador_id',$usuario->id)
                ->get();
            $incidencias = DB::table('incidencias')
                ->select('incidencias.nombre','hospitales.nombre as hospital','users.rol','incidencias.status as status','incidencia_historico.asignacion','users.name','users.apellido','incidencia_historico.comentario')
                ->join('incidencia_historico','incidencias.id','=','incidencia_historico.incidencia_id')
                ->join('users', 'users.id', '=', 'incidencias.user_id')
                ->join('hospitales', 'hospitales.id', '=', 'incidencias.hospital_id')
                ->where('incidencias.created_at','>=',$inicio)
                ->where('incidencias.created_at','<=',$fin)
                ->where('users.subcordinador_id',$usuario->id)
                ->get();

        }elseif($usuario->rol== 'coordinador'){

            $actividades = DB::table('reportes')
                ->select('reportes.nombre','reportes.fecha','reportes.cantidad','reportes.descripcion_actividad','users.name as enlace','users.apellido as apellidoEnlace','hospitales.nombre as hospital','users.rol','reportes.status as status')
                ->join('users', 'users.id', '=', 'reportes.user_id')
                ->join('hospitales', 'hospitales.id', '=', 'reportes.hospital_id')
                ->where('fecha','>=',$inicio)
                ->where('fecha','<=',$fin)
                ->get();
            $incidencias = DB::table('incidencias')
                ->select('incidencias.nombre','hospitales.nombre as hospital','users.rol','incidencias.status as status','incidencia_historico.asignacion','users.name','users.apellido','incidencia_historico.comentario')
                ->join('incidencia_historico','incidencias.id','=','incidencia_historico.incidencia_id')
                ->join('users', 'users.id', '=', 'incidencias.user_id')
                ->join('hospitales', 'hospitales.id', '=', 'incidencias.hospital_id')
                ->where('incidencias.created_at','>=',$inicio)
                ->where('incidencias.created_at','<=',$fin)
                ->get();
        }
        return view('reportes.export', compact('actividades','inicio','fin','incidencias'));

    }

}
