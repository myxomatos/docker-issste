<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\Reportes;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActividadesController extends Controller
{
    public function createActividades()
    {
        $user = Auth::User();

        if (!$user) {
            return redirect(route('login'));
        } else {
            return view('createActividades', compact('user'));
        }
    }

    public function storeActividades(Request $request)
    {
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
        $actividad->fecha = $current_date_time = Carbon::now()->toDate();
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

        return redirect()->route('homeIndexPanel')->with('success');
    }

    public function reporteDate($inicio = null, $fin = null)
    {
        $usuario = Auth::User();
        $now = Carbon::now();
        if ($inicio == null) {
            $fin = $now->subDays(-1)->format('Y-m-d');
            $inicio = $now->subDays()->format('Y-m-d');
        }
        $startDate = Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $fin)->endOfDay();
        $fechasPeriodo = DB::table('reportes')
            ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
            ->where('fecha', '>=', $startDate)
            ->where('fecha', '<=', $endDate)
            ->where('user_id', $usuario->id)
            ->where('status', 'pendiente')
            ->pluck('fecha')
            ->unique();

        $actPeriodo = DB::table('reportes')
            ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
            ->whereIn('fecha', $fechasPeriodo)
            ->where('user_id', $usuario->id)
            ->get();

        if ($usuario->rol == 'enlace') {
            $actividades = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->get();
            $incidencias = DB::table('incidencias')
                ->select('incidencias.nombre', 'hospitales.nombre as hospital', 'users.rol', 'incidencias.status as status', 'incidencia_historico.asignacion', 'users.name', 'users.apellido', 'incidencia_historico.comentario')
                ->join('incidencia_historico', 'incidencias.id', '=', 'incidencia_historico.incidencia_id')
                ->join('users', 'users.id', '=', 'incidencias.user_id')
                ->join('hospitales', 'hospitales.id', '=', 'incidencias.hospital_id')
                ->where('incidencias.created_at', '>=', $startDate)
                ->where('incidencias.created_at', '<=', $endDate)
                ->where('users.id', $usuario->id)
                ->get();
            $tactividades = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->count();
            $tcensos = DB::table('censos')
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<=', $endDate)
                ->where('creado_por', $usuario->id)
                ->get();
            $ncensos = DB::table('censos')
                ->where('created_at', '>=', $startDate)
                ->where('created_at', '<=', $endDate)
                ->where('creado_por', $usuario->id)
                ->count();
            $tincidencias = DB::table('incidencias')
                ->select('incidencias.nombre', 'hospitales.nombre as hospital', 'users.rol', 'incidencias.status as status', 'incidencia_historico.asignacion', 'users.name', 'users.apellido', 'incidencia_historico.comentario')
                ->join('incidencia_historico', 'incidencias.id', '=', 'incidencia_historico.incidencia_id')
                ->join('users', 'users.id', '=', 'incidencias.user_id')
                ->join('hospitales', 'hospitales.id', '=', 'incidencias.hospital_id')
                ->where('incidencias.created_at', '>=', $startDate)
                ->where('incidencias.created_at', '<=', $endDate)
                ->where('users.id', $usuario->id)
                ->count();
            $movu = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'MOVU')
                ->get();
            $otraA = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'Otra Actividad')
                ->get();
            $Itel = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'ISSSTE Tel')
                ->get();
            $telgra = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'Telefonía Gratuita')
                ->get();
            $orien = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'Orientacíon')
                ->get();
            $plat = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'Pláticas')
                ->get();
            $perTur = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'Personal en Turno')
                ->get();
            $superv = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'Supervisiones')
                ->get();
            $voceo = DB::table('reportes')
                ->select('reportes.nombre', 'reportes.fecha', 'reportes.cantidad', 'reportes.descripcion_actividad', 'reportes.descripcion_subactividad')
                ->where('fecha', '>=', $startDate)
                ->where('fecha', '<=', $endDate)
                ->where('user_id', $usuario->id)
                ->where('status', 'pendiente')
                ->where('nombre', 'Voceo')
                ->get();
        }
        return view('reportes.export', compact('actividades', 'inicio', 'fin', 'incidencias', 'tactividades', 'tincidencias', 'movu', 'otraA', 'Itel', 'telgra', 'orien', 'plat', 'perTur', 'superv', 'voceo', 'fechasPeriodo', 'actPeriodo', 'tcensos','ncensos'));
    }
}
