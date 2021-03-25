<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Demanda;
use App\Models\DocumentoDemanda;
use Carbon\Carbon;
use DateTime;


use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Block\Element\Document;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\PdfToImage\Pdf;

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
        $demanda = Demanda::orderBy('id', 'DESC')->paginate();
        return $demanda;
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
        $demanda->estado_id = 2;
        $demanda->user_id = $request->user_id;
        $demanda->save();



        //Get the current data for file path
        $dataActual = Carbon::now();
        $dataActual->setLocale('pt');
        $mes = $dataActual->monthName;
        $ano = $dataActual->year;



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


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$demanda = Demanda::orderBy('id', 'DESC');
        //return $demanda->paginate();
        $dem = Demanda::where('user_id',$id)->orderBy('id', 'DESC')->paginate();
        return $dem;
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
