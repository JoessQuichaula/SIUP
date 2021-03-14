<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Demanda;
use App\Models\Notificacao;
use App\User;
use Illuminate\Http\Request;

class NotificacaoController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $demanda = Demanda::findOrFail($id);
        $user = User::findOrFail($demanda->user_id);
        $telemovel = $user->telemovel;
        $notificacao = Notificacao::all();
        $demanda->motivo = $request->motivo;
        $demanda->estado_id = $request->estado_id;
        $demanda->update();


        if($request->estado_id==1){
            $titulo=$notificacao[0]->titulo;
            $corpo=$notificacao[0]->corpo;
            $this->sendNotification($titulo,$corpo,$telemovel);
        }
        elseif($request->estado_id==2){
            $titulo=$notificacao[1]->titulo;
            $corpo=$notificacao[1]->corpo;
            $this->sendNotification($titulo,$corpo,$telemovel);
        }
        else{
            $titulo=$notificacao[2]->titulo;
            $corpo=$notificacao[2]->corpo;
            $this->sendNotification($titulo,$corpo,$telemovel);
        }


        return redirect('/admin/demandas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function sendNotification($titulo,$corpo,$telemovel){
        $content = array(
            "en" => $corpo
            );
        $heading = array(
                "en" => $titulo
        );

        $fields = array(
            'app_id' => "eba7d6c0-9b0a-43b6-933d-6cc9b11501b1",
            'include_external_user_ids' => array($telemovel),
            'channel_for_external_user_ids' => 'push',
            'data' => array("foo" => "bar"),
            'contents' => $content,
            'headings' => $heading
        );

        $fields = json_encode($fields);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic ODdkMzk5NmMtYzNiZS00YzI0LTk2NDctNzY3YTc5ZGUxN2Q3'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}


