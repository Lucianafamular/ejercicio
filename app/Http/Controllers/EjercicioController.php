<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$array = $request->
        //$cont = array_count_values($array);
        //return response()->(['number_character'=> $cont, 'status'=>200]);
        return view('ejercicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contador(Request $request )
    { 
     $cadena = $request->Fstring;
     $arr1 = str_split($cadena);
     $collect = collect($arr1); 
     $output = $collect->countBy();
     $valores = $output->all();
     $minimo = min($valores);
     $resta = (min($valores)-1);
     $remplazar = str_replace($minimo, $resta, $valores);
     rsort( $valores); 

     
     $clave = array_search($minimo, $valores);  

     if (count(array_unique($valores))==1)
        {
           Session::flash('cadena',$cadena);
           return redirect()->route('ejercicio')->withSuccess('YES');
        }
    else{
        $valores[0] = $valores[0]-1;
        if(count(array_unique($valores))==1)
        {
            Session::flash('cadena',$cadena);
            return redirect()->route('ejercicio')->withSuccess('YES');
        }
        else{
            $valores[$clave]=$valores[$clave]-1;
            unset($valores[$clave]);
             if(count(array_unique($valores))==1){
                Session::flash('cadena',$cadena);
                return redirect()->route('ejercicio')->withSuccess('YES');
             }
             else{
                Session::flash('cadena',$cadena);   
                return redirect()->route('ejercicio')->withErrors('NO');

                } 
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
