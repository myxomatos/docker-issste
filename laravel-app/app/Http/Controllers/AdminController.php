<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\Censos;
use App\Models\Diagnostico;
use App\Models\HistoricoCenso;
use App\Models\Hospitales;
use App\Models\ImagenesIncidencias;
use App\Models\Incidencias;
use App\Models\User;
use App\Models\IncidenciaHistorico;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function index(){

//        $date = Carbon::now()->subDays(1);
        $date = Carbon::now();
        if( $date->format('d') == 10 or $date->format('d') == 11 or $date->format('d') == 12) {
            DB::table('reportes')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('incidencia_historico')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('incidencias_imagenes')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('incidencias')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('actividades')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('incidencias_imagenes')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            
        }
        $usuario = Auth::User();

        if ($usuario->rol== 'coordinador'){
            $total_incidencias = Incidencias::where('status','pendiente')
                ->whereMonth('created_at', '=', Carbon::today()->month)
                ->count();
            $total_actividades = Actividades::where('status','pendiente')
                ->whereMonth('created_at', '=', Carbon::today()->month)
                ->count();
            $incidencias= DB::table('incidencias')
                ->select('incidencias.nombre','incidencias.cargar_evidencia','incidencias.hospital_id','incidencias.id','incidencias.status','incidencias.notas','enlace.name as enlace','incidencias.user_id','incidencias.created_at','incidencia_historico.asignacion')
                ->join('hospitales', 'hospitales.id', '=', 'incidencias.hospital_id')
                ->join('users as subcordinador', 'subcordinador.id', '=', 'hospitales.subcordinador_id')
                ->join('users as enlace', 'enlace.id', '=', 'incidencias.user_id')
                ->leftjoin('incidencia_historico','incidencia_id', '=','incidencias.id')
                ->where('incidencias.status','pendiente')
                ->where(\DB::raw('MONTH(incidencias.created_at)'), Carbon::today()->month)
                ->orderBy('incidencias.created_at', 'DESC')
                ->get();

            $actividades= DB::table('actividades')
                ->select('actividades.nombre','actividades.hospital_id','actividades.id','actividades.status','actividades.descripcion_subactividad','enlace.name as enlace','actividades.descripcion_actividad','actividades.notas','actividades.created_at')
                ->join('hospitales', 'hospitales.id', '=', 'actividades.hospital_id')
                ->join('users as subcordinador', 'subcordinador.id', '=', 'hospitales.subcordinador_id')
                ->join('users as enlace', 'enlace.id', '=', 'actividades.user_id')
                ->where('actividades.status','pendiente')
                ->where(\DB::raw('MONTH(actividades.created_at)'), Carbon::today()->month)
                ->orderBy('actividades.created_at', 'DESC')
                ->get();
        }elseif($usuario->rol== 'subcoordinador'){

            $hospitalesSubCoordinador = Hospitales::where('subcordinador_id',$usuario->id)->pluck('id')->toArray();
            $total_incidencias = Incidencias::whereIn('hospital_id',$hospitalesSubCoordinador)->where('status','pendiente')->count();
            $total_actividades = Actividades::whereIn('hospital_id',$hospitalesSubCoordinador)->count();
            $hospitales = Hospitales::where('subcordinador_id',$usuario->id)->get();

            $actividades= DB::table('actividades')
            ->select('actividades.nombre','actividades.hospital_id','actividades.id','actividades.status','actividades.descripcion_subactividad','enlace.name as enlace','actividades.descripcion_actividad','actividades.notas','actividades.created_at')
                ->join('hospitales', 'hospitales.id', '=', 'actividades.hospital_id')
                ->join('users as subcordinador', 'subcordinador.id', '=', 'hospitales.subcordinador_id')
                ->join('users as enlace', 'enlace.id', '=', 'actividades.user_id')
                ->where('hospitales.subcordinador_id',$usuario->id)
                ->orderBy('actividades.created_at', 'DESC')
                ->get();

            $incidencias= DB::table('incidencias')
                ->select('incidencias.nombre','incidencias.cargar_evidencia','incidencias.hospital_id','incidencias.id','incidencias.status','incidencias.notas','enlace.name as enlace','incidencias.user_id','incidencias.created_at','incidencia_historico.asignacion')
                ->join('hospitales', 'hospitales.id', '=', 'incidencias.hospital_id')
                ->join('users as subcordinador', 'subcordinador.id', '=', 'hospitales.subcordinador_id')
                ->join('users as enlace', 'enlace.id', '=', 'incidencias.user_id')
                ->join('incidencia_historico','incidencia_id', '=','incidencias.id')
                ->where('hospitales.subcordinador_id',$usuario->id)
                ->where('incidencias.status','pendiente')
                ->orderBy('incidencias.created_at', 'DESC')
                ->get();
                //            $incidencias = Incidencias::where('hospital_id',$usuario->hospital_id)->get();
//            $actividades = Actividades::whereIn('hospital_id',$hospitales->user->id)->get();


        }elseif($usuario->rol== 'enlace'){
            $total_incidencias = Incidencias::where('hospital_id',$usuario->hospital_id)->where('status','pendiente')
                ->whereMonth('created_at', '=', Carbon::today()->month)
                ->count();
            $total_actividades = Actividades::where('user_id',$usuario->id)->where('status','pendiente') ->whereMonth('created_at', '=', Carbon::today()->month)
                ->count();
            $incidencias = Incidencias::where('hospital_id',$usuario->hospital_id)->where('status','pendiente')
                ->whereMonth('created_at', '=', Carbon::today()->month)
                ->orderBy('created_at', 'DESC')
                ->get();
            $actividades = Actividades::where('user_id',$usuario->id)->where('status','pendiente')
                ->whereMonth('created_at', '=', Carbon::today()->month)
                ->orderBy('created_at', 'DESC')
                ->get();


            }elseif($usuario->rol== 'general'){
        $total_incidencias = Incidencias::where('hospital_id',$usuario->hospital_id)->where('status','pendiente')
            ->whereMonth('created_at', '=', Carbon::today()->month)
            ->count();
        $total_actividades = Actividades::where('hospital_id',$usuario->hospital_id)
            ->whereMonth('created_at', '=', Carbon::today()->month)
            ->count();
        $incidencias = Incidencias::where('hospital_id',$usuario->hospital_id)
            ->whereMonth('created_at', '=', Carbon::today()->month)
            ->get();
        $actividades = Actividades::where('hospital_id',$usuario->hospital_id)
            ->whereMonth('created_at', '=', Carbon::today()->month)
            ->get();

        }

        return view ('admin.index',compact( 'total_incidencias','total_actividades','incidencias','actividades'));

    }

    public function hospitales (){
        $usuario = Auth::User();

        if ($usuario->rol== 'coordinador' or $usuario->rol== 'subcoordinador'){
            if ($usuario->rol== 'coordinador'){
                $hospitales = Hospitales::where('status','activo')->get();

            }elseif($usuario->rol== 'subcoordinador')
                $hospitales = Hospitales::where('status','activo')
                    ->where('subcordinador_id',$usuario->id)
                    ->get();
            return view ('admin.hospitales',compact('hospitales'));
        }else{
            return redirect()->route('homeIndexPanel');
        }

             }

         public function subcoordinadores (){
             $usuario = Auth::User();
             if ($usuario->rol== 'coordinador'){
                $subcordinadores = User::where('rol','subcoordinador')->get();
                 return view ('admin.subcordinadores',compact('subcordinadores'));
         }else{
                 return redirect()->route('homeIndexPanel');
             }
         }

         public function enlaces(){
             $usuario = Auth::User();
             if ($usuario->rol== 'coordinador' or $usuario->rol== 'subcoordinador'){
                 if ($usuario->rol== 'coordinador'){
                     $enlaces = DB::table('users as enlace')
                         ->select('subcoordinador.name as subcoordinador','enlace.name as enlace','enlace.id as idEnlace','enlace.dias_laborales','enlace.horario_entrada','enlace.horario_salida','enlace.entrada','enlace.salida','enlace.check_in')
                         ->join('users AS subcoordinador', 'subcoordinador.id', '=', 'enlace.subcordinador_id')
                         ->where('subcoordinador.id', '<>', 'enlace.id')
                         ->where('enlace.rol', '=', 'enlace')
                         ->get();

                 }elseif($usuario->rol== 'subcoordinador')
                     $enlaces = DB::table('users as enlace')
                         ->select('subcoordinador.name as subcoordinador','enlace.name as enlace','enlace.id as idEnlace','enlace.dias_laborales','enlace.horario_entrada','enlace.horario_salida','enlace.entrada','enlace.salida','enlace.check_in')
                         ->join('users AS subcoordinador', 'subcoordinador.id', '=', 'enlace.subcordinador_id')
                         ->where('subcoordinador.id', '<>', 'enlace.id')
                         ->where('enlace.subcordinador_id',$usuario->id)
                         ->where('enlace.rol', '=', 'enlace')
                         ->get();

                 return view ('admin.enlaces',compact('enlaces'));
             }else{
                     return redirect()->route('homeIndexPanel');
                 }
             }

             public function showIncidencia($id){
                $incidencia = Incidencias::find($id);
                $historico = DB::table('incidencia_historico')
                    ->select('incidencia_historico.comentario','incidencia_historico.asignacion','incidencia_historico.created_at','users.name as creado_por','incidencia_historico.id')
                    ->join ('users','incidencia_historico.user_id','=','users.id')
                    ->where('incidencia_historico.incidencia_id',$id)
                    ->get();
            $imagenes = ImagenesIncidencias::where('incidencia_id',$id)->get();
            return view ('admin.showIncidencia',compact('incidencia','historico','imagenes'));
        }
        public function indexCensos(){
            $usuario = Auth::User();
            if ($usuario->rol== 'coordinador' or $usuario->rol== 'subcoordinador' or $usuario->rol== 'enlace'){
                if ($usuario->rol== 'coordinador'){
                    $censos = Censos::paginate(25);
                }elseif($usuario->rol== 'subcoordinador' or $usuario->rol== 'enlace'){
                    $censos = Censos::where('hospital_id',$usuario->hospital_id)->paginate(25);
                }
            }
    
    
    //        $censos = Censos::paginate(25);
            return view ('admin.indexCensos',compact('censos'));
        }
        public function aeropuerto(){
            $usuario = Auth::User();
            if ($usuario->rol== 'coordinador' or $usuario->rol== 'subcoordinador' or $usuario->rol== 'enlace'){
                if ($usuario->rol== 'coordinador'){
                    $censos = Censos::paginate(25);
                }elseif($usuario->rol== 'subcoordinador' or $usuario->rol== 'enlace'){
                    $censos = Censos::where('hospital_id',$usuario->hospital_id)->paginate(25);
                }
            }
    
            return view ('admin.aeropuerto',compact('censos'));
        }
        public function directorio(){
            $usuario = User::all();
            return view ('admin.directorio',compact('usuario'));
        }
        public function search(Request $query){
            $search_text = $_GET['query'];
            $censos = Censos::where('nombre','LIKE','%'.$search_text.'%')
                ->orWhere('apellidos','LIKE','%'.$search_text.'%')
                ->orWhere('genero','LIKE','%'.$search_text.'%')
                ->orWhere('rfc','LIKE','%'.$search_text.'%')
                ->orWhere('cama','LIKE','%'.$search_text.'%')
                ->get();
    
    //        $censos = Censos::where('status','alta')->search($query->q, null, true, true)->get();
    //        $search = $query->q;
    
    
            return view ('admin.search',compact('censos'));
        }
    
        public function createCenso(){
            $censos = Censos::all();
            $hospitales = Hospitales::where('status','activo')->get();
            $diagnosticos = Diagnostico::orderBy('nombre', 'ASC')->get();
            return view ('admin.createCenso',compact('censos','hospitales','diagnosticos'));
        }
    
        public function storeCenso(Request $request){
            $request->validate([
                'rfc' => ['required', 'unique:censos'],
            ]);
            $usuario = Auth::User();
            $censos = new Censos();
            $censos->nombre = $request->nombre;
            $censos->apellidos = $request->apellidos;
            $censos->genero = $request->genero;
            $censos->edad = $request->edad;
            $censos->hospital_id = $request->hospital;
            $censos->telefono = $request->telefono;
            $censos->doctor = $request->doctor;
            $censos->rfc = $request->rfc;
            $censos->tipo_derechohabiente = $request->tipo_derechohabiente;
            $censos->tipo_hospitalizacion = $request->tipo_hospitalizacion;
            $censos->diagnostico = $request->diagnostico;
            $censos->cama = $request->cama;
            $censos->folio = $request->folio;
            $censos->dato_salud = $request->dato_salud;
            $censos->status = $request->status;
            $censos->creado_por = $usuario->id;
            $censos->save();
    
            if($usuario){
                DB::table('actividades')
                    ->insert(array("nombre" => 'Ingreso Censo',
                        "descripcion_actividad" => 'Descripcion',
                        "descripcion_subactividad" => 'Descripcion',
                        "status" => 'pendiente',
                        "notas" => 'Ingreso de Censo',
                        "hospital_id" => $usuario->hospital_id,
                        "user_id" => $usuario->id,
                       'created_at'=> $current_date_time = Carbon::now()->toDateTimeString(),
                        'updated_at'=> $current_date_time = Carbon::now()->toDateTimeString()));
    
            }
            return redirect()->route('indexCensos');
        }
    
        public function editCenso($id){
            $censo = Censos::find($id);
            $hospitales = Hospitales::where('status','activo')->get();
            $diagnosticos = Diagnostico::all();
            return view ('admin.editCenso',compact('censo','hospitales','diagnosticos'));
        }
    
        public function updateCenso(Request $request, $id){
            $usuario = Auth::User();
            $censos = Censos::find($id);
            if($request->tipo_egreso != ''){
                $historico = HistoricoCenso::where('censo_id',$id)->delete();
                $censos = Censos::find($id);
                $censos->delete();

            }else{
                $censos->nombre = $request->nombre;
                $censos->apellidos = $request->apellidos;
                $censos->genero = $request->genero;
                $censos->edad = $request->edad;
                $censos->hospital_id = $request->hospital;
                $censos->rfc = $request->rfc;
                $censos->telefono = $request->telefono;
                $censos->tipo_derechohabiente = $request->tipo_derechohabiente;
                $censos->diagnostico = $request->diagnostico;
                $censos->status = $request->status;
                $censos->cama = $request->cama;
                $censos->doctor = $request->doctor;
                $censos->folio = $request->folio;
                $censos->dato_salud = $request->dato_salud;
                $censos->created_at = $request->fecha_ingreso;
                $censos->tipo_egreso = $request->tipo_egreso;
                $censos->tipo_hospitalizacion = $request->tipo_hospitalizacion;

            DB::table('historico_censo')
                ->insert(array("censo_id" => $id,
                    "creado_por" => $usuario->id,
                    "comentario" => $request->comentario,
                    'created_at'=> $current_date_time = Carbon::now()->toDateTimeString(),
                    'updated_at'=> $current_date_time = Carbon::now()->toDateTimeString(),
                ));
                $censos->updated_at = $current_date_time = Carbon::now()->toDateTimeString();

            $censos->save();
        }

        return redirect()->route('indexCensos');
    }

    public function perfil(){
        $usuario = Auth::User();
        if ($usuario->rol== 'subcoordinador' or $usuario->rol== 'coordinador' or $usuario->rol== 'enlace' ){
            $hospitales = Hospitales::where('subcordinador_id',$usuario->id)->get();

        }
        if ($usuario->rol== 'enlace'){

            $usuario = Auth::User();
        }

        return view ('perfil.index',compact('usuario','hospitales'));
    }
    public function historicoCenso($id){
        $usuario = Auth::User();
        $censo = Censos::find($id);
        $historial = DB::table('historico_censo')
            ->select('historico_censo.censo_id','historico_censo.creado_por','historico_censo.comentario','users.name','historico_censo.created_at as fecha_coment')
            ->join('users', 'users.id', '=', 'historico_censo.creado_por')
            ->join('censos', 'censos.id', '=', 'historico_censo.censo_id')
            ->where('historico_censo.censo_id',$id)
            ->get();

        return view ('admin.historicoCenso',compact('censo','historial'));
    }

    public function createHospital(){
        $usuario = Auth::User();
        if ($usuario->rol== 'coordinador'){
        $usuarios = User::where('rol','subcoordinador')->get();

        return view ('admin.hospital.create',compact('usuarios'));
             }else{
            return redirect()->route('homeIndexPanel');
        }
    }

    public function storeHospital(Request $request){
        $usuario = Auth::User();
        $hospital = new Hospitales();
        $hospital->nombre = $request->nombre;
        $hospital->subcordinador_id = $request->subcordinador_id;
        $hospital->save();
        return redirect()->route('hospitalesIndex');


    }
    public function editHospital($id){
        $hospital = Hospitales::find($id);
        $usuarios = User::where('rol','subcoordinador')->get();
        return view ('admin.hospital.edit',compact('hospital','usuarios'));
    }
    public function updateHospital(Request $request,$id){
        $usuario = Auth::User();
        $hospital = Hospitales::find($id);
        $hospital->nombre = $request->nombre;
        $hospital->status = $request->status;
        $hospital->save();
        return redirect()->route('hospitalesIndex');


    }
    public function createColaborador(){
        $usuario = Auth::User();
        if ($usuario->rol== 'coordinador'){
            $hospitales = Hospitales::where('status','activo')->get();
            $subcoordinador = User::where('rol','subcoordinador')->get();

            return view ('admin.miembros.create',compact('hospitales','subcoordinador'));
        }else{
            return redirect()->route('homeIndexPanel');
        }
    }
    public function storeColaborador(Request $request){
        $request->validate([
            //            'name' => ['required', 'string', 'max:255'],
            //            'name' => ['required', 'string', 'max:255'],
            //            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //        ]);
        ]);
        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'turno' => $request->turno,
            'apellido' => $request->apellidos,
            'rol' => $request->rol,
            'hospital_id' => $request->hospital,
            'subcordinador_id' => $request->subcoordinador,
            'turno' => $request->turno,
            'dias_laborales' => $request->dias_laborales,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('homeIndexPanel');


    }
    public function editEnlace($id){
        $enlaceSubcordinador = DB::table('users as enlace')
            ->select('subcoordinador.name as subcoordinador','enlace.name as enlace','enlace.id as idEnlace','subcoordinador.id as idSubcoordinador')
            ->join('users AS subcoordinador', 'subcoordinador.id', '=', 'enlace.subcordinador_id')
            ->where('subcoordinador.id', '<>', 'enlace.id')
            ->where('enlace.id', '=', $id)
            ->get();
        $enlace = User::find($id);
        $subcoordinador = User::where('rol','subcoordinador')->get();
        $hospitales = Hospitales::where('status','activo')->get();
        return view ('admin.miembros.editEnlace',compact('enlace','subcoordinador','hospitales','enlaceSubcordinador'));
    }
    public function updateEnlace(Request $request,$id){



        $enlace= User::find($id);
        $enlace->name = $request->nombre;
        $enlace->apellido = $request->apellidos;
        $enlace->email = $request->email;
        $enlace->rol = $request->rol;
        $enlace->hospital_id = $request->hospital;
        $enlace->subcordinador_id = $request->subcoordinador;
        $enlace->save();
        return redirect()->route('enlacesIndex');


    }
}
