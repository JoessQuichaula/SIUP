<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Demanda;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DemandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix());
        //
        return Demanda::all();
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
    public function store(Request $request)
    {
        //Save data retrieved from request Mobile - SIUP MOBILE
        $demanda = new Demanda;
        $demanda->reparticao_id = $request->reparticao_id;
        $demanda->servico_id = $request->servico_id;
        $demanda->estado = "Em Andamento";
        $demanda->save();

        //Get the current data for file path
        $dataActual = Carbon::now();
        $dataActual->setLocale('pt');
        $mes = $dataActual->monthName;
        $ano = $dataActual->year;

        $paths = array();

        //Save file from request Mobile - SIUP MOBILE
        foreach ($request->file() as $file){
            $filePath = "demandas\\".$ano."\\".$mes."\\".$demanda->id;
            $file->store($filePath);
            $filePath .= "\\".$file->hashName();
            array_push($paths,$filePath);

        }
        
        $demanda->ficheiros = json_encode($paths);
        $demanda->update();

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
