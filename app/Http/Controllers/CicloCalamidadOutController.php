<?php

namespace App\Http\Controllers;

use App\ciclocalamidadout;
use Carbon\carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ciclo;

class CiclocalamidadOutController extends Controller
{

          /**

     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setlocale('co');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ciclo $ciclosos)
    {
        date_default_timezone_set('America/Bogota');
        Carbon::setLocale('co');
        $hoy = Carbon::now();
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $hoy = Carbon::now()->format('Y-m-d');

        $llave = $user_cedula. $hoy;

        $carbon1 = new \Carbon\Carbon("2021-01-01 00:00:00");


        // $date1 = $ciclosos->breakin;
        // $date2 = $ciclosos->breakout;
        // $tiempoA = $carbon1->diffInMinutes($date1);
        // $tiempoB = $carbon1->diffInMinutes($date2);
        // $timebreak = ($tiempoB - $tiempoA);

        $date3 = $ciclosos->almuerzo;
        $date4 = $ciclosos->almuerzoout;
        $tiempoC = $carbon1->floatDiffInHours($date3);
        $tiempoD = $carbon1->floatDiffInHours($date4);
        $timelunch = ($tiempoD - $tiempoC);
        $timelunch = number_format($timelunch,1,'.',',');

        $date5 = $ciclosos->capacitacion;
        $date6 = $ciclosos->capout;
        $tiempoE = $carbon1->diffInMinutes($date5);
        $tiempoF = $carbon1->diffInMinutes($date6);
        $timecapa = ($tiempoF - $tiempoE);

        $date7 = $ciclosos->pausas;
        $date8 = $ciclosos->pausasout;
        $tiempoG = $carbon1->diffInMinutes($date7);
        $tiempoH = $carbon1->diffInMinutes($date8);
        $timepausas = ($tiempoH - $tiempoG);

        $date9 = $ciclosos->daño;
        $date10 = $ciclosos->dañoout;
        $tiempoI = $carbon1->diffInMinutes($date9);
        $tiempoJ = $carbon1->diffInMinutes($date10);
        $timedaño = ($tiempoJ - $tiempoI);

        $date11 = $ciclosos->evaluacion;
        $date12 = $ciclosos->evaluacionout;
        $tiempoK = $carbon1->diffInMinutes($date11);
        $tiempoL = $carbon1->diffInMinutes($date12);
        $timeeva = ($tiempoL - $tiempoK);

        $date13 = $ciclosos->retro;
        $date14 = $ciclosos->retroout;
        $tiempoM = $carbon1->diffInMinutes($date13);
        $tiempoN = $carbon1->diffInMinutes($date14);
        $timeretro = ($tiempoN - $tiempoM);

        $date15 = $ciclosos->reunion;
        $date16 = $ciclosos->reunionout;
        $tiempoO = $carbon1->diffInMinutes($date15);
        $tiempoP = $carbon1->diffInMinutes($date16);
        $timereunion = ($tiempoP - $tiempoO);

        $date17 = $ciclosos->calamidad;
        $date18 = $ciclosos->calamidadout;
        $tiempoQ = $carbon1->diffInMinutes($date17);
        $tiempoR = $carbon1->diffInMinutes($date18);
        $timecalamidad = ($tiempoR - $tiempoQ);

        $ingreso =$ciclosos->ingreso;
        $salida  =$ciclosos->salida;
        $ingresoA = $carbon1->diffInHours($ingreso);
        $salidaB = $carbon1->diffInHours($salida);
        $total = ($salidaB - $ingresoA)-$timelunch;
        $validatedData = $request->validate([
            'calamidadout'          => ['required|unique:ciclos,calamidadout'],
        ]);
        
        $ciclosos = new Ciclo();
        $ciclosos->nombre            = $user_nombre;
        $ciclosos->cedula            = $user_cedula;
        $ciclosos->fecha             = $hoy;
        $ciclosos->calamidad         = $hora;
        $ciclosos->llave             = $llave;

        $ciclosos->save();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CicloCalamidadOut  $cicloCalamidadOut
     * @return \Illuminate\Http\Response
     */
    public function show(CicloCalamidadOut $cicloCalamidadOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CicloCalamidadOut  $cicloCalamidadOut
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        date_default_timezone_set('America/Bogota');
        Carbon::setLocale('co');
        $hoy = Carbon::now();
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $hoy = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $llave = $user_cedula. $hoy;

        $carbon1 = new \Carbon\Carbon("2021-01-01 00:00:00");
        $ciclosos=Ciclo::findOrFail($id);



        $date3 = $ciclosos->almuerzo;
        $date4 = $ciclosos->almuerzoout;
        $tiempoC = $carbon1->floatDiffInHours($date3);
        $tiempoD = $carbon1->floatDiffInHours($date4);
        $timelunch = ($tiempoD - $tiempoC);
        $timelunch = number_format($timelunch,1,'.',',');

        $date5 = $ciclosos->capacitacion;
        $date6 = $ciclosos->capout;
        $tiempoE = $carbon1->diffInMinutes($date5);
        $tiempoF = $carbon1->diffInMinutes($date6);
        $timecapa = ($tiempoF - $tiempoE);

        $date7 = $ciclosos->pausas;
        $date8 = $ciclosos->pausasout;
        $tiempoG = $carbon1->diffInMinutes($date7);
        $tiempoH = $carbon1->diffInMinutes($date8);
        $timepausas = ($tiempoH - $tiempoG);

        $date9 = $ciclosos->daño;
        $date10 = $ciclosos->dañoout;
        $tiempoI = $carbon1->diffInMinutes($date9);
        $tiempoJ = $carbon1->diffInMinutes($date10);
        $timedaño = ($tiempoJ - $tiempoI);

        $date11 = $ciclosos->evaluacion;
        $date12 = $ciclosos->evaluacionout;
        $tiempoK = $carbon1->diffInMinutes($date11);
        $tiempoL = $carbon1->diffInMinutes($date12);
        $timeeva = ($tiempoL - $tiempoK);

        $date13 = $ciclosos->retro;
        $date14 = $ciclosos->retroout;
        $tiempoM = $carbon1->diffInMinutes($date13);
        $tiempoN = $carbon1->diffInMinutes($date14);
        $timeretro = ($tiempoN - $tiempoM);

        $date15 = $ciclosos->reunion;
        $date16 = $ciclosos->reunionout;
        $tiempoO = $carbon1->diffInMinutes($date15);
        $tiempoP = $carbon1->diffInMinutes($date16);
        $timereunion = ($tiempoP - $tiempoO);

        $ingreso =$ciclosos->ingreso;
        $salida  =$ciclosos->salida;
        $ingresoA = $carbon1->diffInHours($ingreso);
        $salidaB = $carbon1->diffInHours($salida);
        $total = ($salidaB - $ingresoA)-diffInHours;

        $date1 = $ciclosos->breakin;
        $date2 = $ciclosos->breakout;
        $tiempoA = $carbon1->diffInMinutes($date1);
        $tiempoB = $carbon1->diffInMinutes($date2);
        $timebreak = ($tiempoB - $tiempoA);
        $timebreak = number_format($timebreak,1,'.',',');

        $date17 = $ciclosos->calamidad;
        $date18 = $ciclosos->calamidadout;
        $tiempoQ = $carbon1->diffInMinutes($date17);
        $tiempoR = $carbon1->diffInMinutes($date18);
        $timecalamidad = ($tiempoR - $tiempoQ);


        return view('ciclocalamidadout.edit', compact('total','ciclosos','date1','date2','date3','date4','date5','date6','date7','date8','date9','date10','date11','date12','date13','date14','date15','date16','date17','date18','ciclosos','hoy','hora','llave','user_nombre','user_cedula','timebreak','timelunch','timecapa','timepausas','timedaño','timeeva', 'timeretro','timereunion','timecalamidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CicloBreakOut  $cicloBreakOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set('America/Bogota');
        Carbon::setLocale('co');
        Carbon::now();
        $hoy = Carbon::now();
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $hoy = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $llave = $user_cedula. $hoy;

        $carbon1 = new \Carbon\Carbon("2021-01-01 00:00:00");
        $ciclosos=Ciclo::findOrFail($id);

        $date1 = $ciclosos->breakin;
        $date2 = $ciclosos->breakout;
        $tiempoA = $carbon1->diffInMinutes($date1);
        $tiempoB = $carbon1->diffInMinutes($date2);
        $timebreak = ($tiempoB - $tiempoA);

        $date3 = $ciclosos->almuerzo;
        $date4 = $ciclosos->almuerzoout;
        $tiempoC = $carbon1->floatDiffInHours($date3);
        $tiempoD = $carbon1->floatDiffInHours($date4);
        $timelunch = ($tiempoD - $tiempoC);
        $timelunch = number_format($timelunch,1,'.',',');

        $date5 = $ciclosos->capacitacion;
        $date6 = $ciclosos->capout;
        $tiempoE = $carbon1->diffInMinutes($date5);
        $tiempoF = $carbon1->diffInMinutes($date6);
        $timecapa = ($tiempoF - $tiempoE);

        $date7 = $ciclosos->pausas;
        $date8 = $ciclosos->pausasout;
        $tiempoG = $carbon1->diffInMinutes($date7);
        $tiempoH = $carbon1->diffInMinutes($date8);
        $timepausas = ($tiempoH - $tiempoG);

        $date9 = $ciclosos->daño;
        $date10 = $ciclosos->dañoout;
        $tiempoI = $carbon1->diffInMinutes($date9);
        $tiempoJ = $carbon1->diffInMinutes($date10);
        $timedaño = ($tiempoJ - $tiempoI);

        $date11 = $ciclosos->evaluacion;
        $date12 = $ciclosos->evaluacionout;
        $tiempoK = $carbon1->diffInMinutes($date11);
        $tiempoL = $carbon1->diffInMinutes($date12);
        $timeeva = ($tiempoL - $tiempoK);

        $date13 = $ciclosos->retro;
        $date14 = $ciclosos->retroout;
        $tiempoM = $carbon1->diffInMinutes($date13);
        $tiempoN = $carbon1->diffInMinutes($date14);
        $timeretro = ($tiempoN - $tiempoM);

        $date15 = $ciclosos->reunion;
        $date16 = $ciclosos->reunionout;
        $tiempoO = $carbon1->diffInMinutes($date15);
        $tiempoP = $carbon1->diffInMinutes($date16);
        $timereunion = ($tiempoP - $tiempoO);

        $ingreso =$ciclosos->ingreso;
        $salida  =$ciclosos->salida;
        $ingresoA = $carbon1->diffInHours($ingreso);
        $salidaB = $carbon1->diffInHours($salida);
        $total = ($salidaB - $ingresoA)-$timelunch;

        $date17 = $ciclosos->calamidad;
        $date18 = $ciclosos->calamidadout;
        $tiempoQ = $carbon1->diffInMinutes($date17);
        $tiempoR = $carbon1->diffInMinutes($date18);
        $timecalamidad = ($tiempoR - $tiempoQ);


        $datosCiclo =request()->except(['_token','_method']);
        Ciclo::where('id','=',$id)->update($datosCiclo);
       // return response()->json($ciclosos);
     return view('ciclosalida.edit', compact('total','ciclosos','date1','date2','date3','date4','date5','date6','date7','date8','date9','date10','date11','date12','date13','date14','date15','date16','date17','date18','ciclosos','hoy','hora','llave','user_nombre','user_cedula','timebreak','timelunch','timecapa','timepausas','timedaño','timeeva', 'timeretro','timereunion','timecalamidad'));

    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CicloCalamidadOut  $cicloCalamidadOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(CicloCalamidadOut $cicloCalamidadOut)
    {
        //
    }
}
