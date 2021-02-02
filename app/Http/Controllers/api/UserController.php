<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\PdfToImage\Pdf;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user();
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

        /*
        $rules = [
            'name' => 'unique:users|required',
            'email'    => 'unique:users|required',
            'telemovel' => 'unique:users|required',
            'password' => 'required',
        ];

        $input = $request->only('name', 'email','password');
        $validator = Validator::make($input, $rules);


        if ($validator->fails()) {
            return response()->json(['success' => false]);
        }*/

        //Save file from request Mobile - SIUP MOBILE
        $name = $request->name;
        $email = $request->email;
        $telemovel = $request->telemovel;
        $password = $request->password;
        $bilhete_identidade = $request->bilhete_identidade;

        User::create(
        ['name' => $name,
         'telemovel' => $telemovel,
         'email' => $email,
         'bilhete_identidade'=> $bilhete_identidade,
         'password' => Hash::make($password)]);


         //Get the current data for file path
        $dataActual = Carbon::now();
        $dataActual->setLocale('pt');
        $mes = $dataActual->monthName;
        $ano = $dataActual->year;


        //Configuration for Thumbnail
        $ghostScriptExePath = "C:/laragon/bin/gs9.53.3/bin/gswin64c.exe";
        Ghostscript::setGsPath($ghostScriptExePath);

        $user = User::where('telemovel', '=', "$telemovel")->firstOrFail();
         foreach ($request->file() as $file) {
            $filePath = "users\\$ano\\$mes\\$user->id";
            $filePathForThumbNail = public_path()."\\storage\\$filePath\\thumbnails";
            $assetFilePathForThumbNail = "$filePath\\thumbnails";

            $file->store($filePath);

            File::makeDirectory($filePathForThumbNail);

            $filename = pathinfo($file, PATHINFO_FILENAME);
            $filePath .= "\\".$file->hashName();
            $assetFilePathForThumbNail .= "\\$filename.jpeg";
            $fullFilePath = public_path()."\\storage\\$filePath";

            $pdfToImageManager = new Pdf($fullFilePath);
            $pdfToImageManager->setResolution(500);
            $pdfToImageManager->saveImage("$filePathForThumbNail\\$filename");

        }


        $user->bilhete_identidade_ficheiro = $filePath;
        $user->bilhete_identidade_thumbnail = $assetFilePathForThumbNail;

        $user->update();
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
