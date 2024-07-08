<?php

namespace App\Http\Controllers;

use App\Models\ImagenesIncidencias;
use App\Models\IncidenciaHistorico;
use App\Models\Incidencias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Actividades;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class IncidenciasController extends Controller
{
    public function createIncidencias($id){
        $user = Auth::User();
        $usuarios = User::where('hospital_id',$user->hospital_id)->where('rol','!=','general')->get();
        $actividades = Actividades::find($id);
        $incidencia = Incidencias::all();

        return view('createIncidencias', compact('incidencia','actividades','usuarios','user'));
    }

    public function storeIncidencias(Request $request, $actividad_id){
        $usuario = Auth::User();
        $ruta = 'img/evidencia';
        $path = public_path($ruta);
        $file = $request->file('file');

        $fileName = 'issste.png';
        if (File::exists($path . '/' . $fileName))
        {
            $i = 1;
            while(File::exists($path . '/' . $fileName))
            {
                $fileName = 'issste-' . $i . '.png';
                $i++;
            }
        }

        $file->move($path, $fileName);
        $imagenes = new ImagenesIncidencias();
        $imagenes->img = $ruta . '/' . $fileName;
        $imagenes->actividad_id = $actividad_id;
        $imagenes->save();


        return redirect()->route("homeIndexPanel")->with("success");
    }

    public function cancelIncidencias(Request $request, $actividad_id){
        $imagenes = ImagenesIncidencias::where('actividad_id',$actividad_id)->get()->each->delete();

        return redirect()->route("homeIndexPanel")->with("success");
    }

    public function storeIncidenciasCont(Request $request, $actividad_id){

        $usuario = Auth::User();

        $incidencia = new Incidencias();
        $incidencia->nombre = $request->nombre;
        $incidencia->notas = $request->notas;
        $incidencia->user_id = $request->nombre_usuario;
        $incidencia->hospital_id = $usuario->hospital_id;
        $incidencia->actividad_id = $actividad_id;
        $incidencia->status = $request->status;
        $incidencia->save();

        $actividad = Actividades::find($request->actividad_id);
        $actividad->status = 'resuelto';
        $actividad->save();
        DB::table('incidencias_imagenes')
            ->where('actividad_id', $request->actividad_id)
            ->update(['incidencia_id' => $incidencia->id]);

        return redirect()->route("homeIndexPanel")->with("success");
    }

    public function editIncidencia($id){

        $usuario = Auth::User();
        $subcordinador = DB::table('hospitales')
            ->select('users.name','users.apellido')
            ->join ('users','users.id','=','hospitales.subcordinador_id' )
            ->where('hospitales.id',$usuario->hospital_id)->first();
        $coordinador = User::where('rol','coordinador')->where('name', 'Abacu') ->get();
        if ($usuario->rol == 'coordinador' or $usuario->rol== 'subcoordinador'){
            $incidencia = Incidencias::find($id);
            $usuarios = User::where('hospital_id',$incidencia->hospital_id)
                ->where('rol','enlace')
                ->get();
        }else{
            $usuarios = User::where('hospital_id',$usuario->hospital_id)
                ->where('rol','enlace')
                ->get();
        }

        if ($usuario->rol == 'coordinador' or $usuario->rol== 'subcoordinador' or $usuario->rol== 'enlace' or $usuario->rol== 'administrador' or $usuario->rol== 'coordinadorad'){
            $incidencia = Incidencias::find($id);
            $imagenes = ImagenesIncidencias::where('incidencia_id',$id)->get();
            return view('admin.editIncidencia', compact('incidencia','usuarios','subcordinador','imagenes','coordinador'));
        }else{
            return redirect()->route('homeIndexPanel');
        }

    }

    public function storeIncidenciasEdit(Request $request, $incidencia_id){

        $usuario = Auth::User();
        $ruta = 'img/evidencia';
        $path = public_path($ruta);
        $file = $request->file('file');

        $fileName = 'issste.png';
        if (File::exists($path . '/' . $fileName))
        {
            $i = 1;
            while(File::exists($path . '/' . $fileName))
            {
                $fileName = 'issste-' . $i . '.png';
                $i++;
            }
        }

        $file->move($path, $fileName);
        $imagenes = new ImagenesIncidencias();
        $imagenes->img = $ruta . '/' . $fileName;
        $imagenes->incidencia_id = $incidencia_id;
        $imagenes->save();


        return redirect()->route("homeIndexPanel")->with("success");
    }


    public function updateIncidencia(Request $request, $id){
        $usuario = Auth::User();
        $incidencia = Incidencias::find($id);
        $incidencia->status = $request->status;
        $incidencia->save();
        DB::table('incidencia_historico')
            ->insert(array("incidencia_id" => $id,
                "user_id" => $usuario->id,
                "comentario" => $request->comentario,
                "asignacion" => $request->asignacion,
                'created_at'=> $current_date_time = Carbon::now()->toDateTimeString(),
                'updated_at'=> $current_date_time = Carbon::now()->toDateTimeString(),
            ));
        
            $incidencia_historico = IncidenciaHistorico::where('incidencia_id',$id)->latest('id')->first();
            DB::table('incidencias_imagenes')
                ->where('actividad_id', $request->actividad_id)
                ->update(['incidencia_historico_id' => $incidencia_historico->id]);
        return redirect()->route('showIncidencia',[$id]);
    }

}