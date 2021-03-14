<?php

namespace App\Http\Controllers;

use App\Models\Demanda;
use App\Models\Servico;
use App\Models\DocumentoDemanda;
use App\Models\Unidade;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\PdfToImage\Pdf;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidades',compact('unidades'));
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

    public function teste()
    {
        return view('teste');
    }

    public function testePlaceHolder(Request $request)
    {

        //Save data retrieved from request Mobile - SIUP MOBILE
        $demanda = new Demanda;
        $demanda->reparticao_id = $request->reparticao_id;
        $demanda->servico_id = $request->servico_id;
        $demanda->estado_id = 2;
        $demanda->user_id = $request->user_id;
        $demanda->save();



        //Get the current data for file path
        $dataActual = Carbon::now();
        $dataActual->setLocale('pt');
        $mes = $dataActual->monthName;
        $ano = $dataActual->year;


        //$paths = array();

        //Configuration for Thumbnail
        $ghostScriptExePath = "C:/laragon/bin/gs9.53.3/bin/gswin64c.exe";
        Ghostscript::setGsPath($ghostScriptExePath);

        $isThumbNailDirectoryAlredyCreated = false;

        $index = 0;
        $idDocuments = array_keys($request->file());


        //Save file from request Mobile - SIUP MOBILE
        foreach ($request->file() as $file){
            $documentStats = new DocumentoDemanda();
            $filePath = "demandas\\$ano\\$mes\\$demanda->id";
            $fileDocumentId = $idDocuments[$index];
            $filePathForThumbNail = public_path()."\\storage\\$filePath\\thumbnails";
            $assetFilePathForThumbNail = "$filePath\\thumbnails";
            $file->store($filePath);

            if(!$isThumbNailDirectoryAlredyCreated){
                File::makeDirectory($filePathForThumbNail);
                $isThumbNailDirectoryAlredyCreated = true;
            }

            $filename = pathinfo($file, PATHINFO_FILENAME);
            $filePath .= "\\".$file->hashName();
            $assetFilePathForThumbNail .= "\\$filename.jpeg";
            $fullFilePath = public_path()."\\storage\\$filePath";
            $pdfToImageManager = new Pdf($fullFilePath);
            $pdfToImageManager->setResolution(500);
            $pdfToImageManager->saveImage("$filePathForThumbNail\\$filename");

            $documentStats->demanda_id = $demanda->id;
            $documentStats->ficheiro = $filePath;
            $documentStats->thumbnail = $assetFilePathForThumbNail;
            $documentStats->documento_id = $fileDocumentId;
            $documentStats->save();

            ++$index;
        }

        return dd($demanda);
        //return view('home');

    }

    public function dropzoneTest(Request $request){


        return dd($request);

    }

}
