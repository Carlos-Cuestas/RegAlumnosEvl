<?php

namespace App\Http\Controllers;

use App\Models\horarioalumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('horarioalumnos.index',[
            'horarios' => horarioalumnos::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $count = DB::table('horarioalumnos')
         ->where('hora', '=',   'Teoria-Lunes de 10am-12pm')
         ->orWhere('hora', '=', 'Teoria-Lunes de 4pm-6pm')
         ->orWhere('hora', '=', 'Teoria-Miercoles de 10am-12pm')
         ->orWhere('hora', '=', 'Teoria-Miercoles de 4pm-6pm')
         ->orWhere('hora', '=', 'Teoria-Viernes de 10am-12pm')
         ->orWhere('hora', '=', 'Teoria-Viernes de 4pm-6pm')
         ->count();

         $count2 = DB::table('horarioalumnos')
         ->where('hora', '=',   'Practica-Lunes a Viernes de 8am-10am')
         ->orWhere('hora', '=', 'Practica-Lunes a Viernes de 10am-12pm')
         ->count();





         $attributes = $request->all();

         if ($count <= 19 && strpos($attributes['hora'], 'Teoria') !== false) {
             $attributes = $request->validate([
                 'dui' => 'required|string|max:255',
                 'nombre' => 'required|string|max:255',
                 'apellido' => 'required|string|max:255',
                 'grupo' => 'required|string|max:255',
                 'hora' => 'required|string|max:255',
             ]);

             horarioalumnos::create($attributes);

         }

            if ($count2 <= 9 && strpos($attributes['hora'], 'Practica') !== false) {
                $attributes = $request->validate([
                    'dui' => 'required|string|max:255',
                    'nombre' => 'required|string|max:255',
                    'apellido' => 'required|string|max:255',
                    'grupo' => 'required|string|max:255',
                    'hora' => 'required|string|max:255',
                ]);

                horarioalumnos::create($attributes);

            }

            return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(horarioalumnos $horarioalumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(horarioalumnos $horarioalumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, horarioalumnos $horarioalumno)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(horarioalumnos $horarioalumno)
    {
        $horarioalumno->delete();
        return back();
    }
}
