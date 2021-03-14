<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\PdfToImage\Pdf;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'bilhete_identidade' =>['required','string','max:14','min:14','unique:users'],
            'telemovel' => ['required', 'string','min:9', 'max:9', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {



        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'bilhete_identidade'=>$data['bilhete_identidade'],
            'telemovel' => $data['telemovel'],
            'password' => Hash::make($data['password']),
        ]);

        //Get the current data for file path
        $dataActual = Carbon::now();
        $dataActual->setLocale('pt');
        $mes = $dataActual->monthName;
        $ano = $dataActual->year;


        //Configuration for Thumbnail
        $ghostScriptExePath = "C:/laragon/bin/gs9.53.3/bin/gswin64c.exe";
        Ghostscript::setGsPath($ghostScriptExePath);


        $request = request();
        $file = $request->file('ficheiro');
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


        $user->bilhete_identidade_ficheiro = $filePath;
        $user->bilhete_identidade_thumbnail = $assetFilePathForThumbNail;
        $user->update();
        return $user;
        
    }
}
