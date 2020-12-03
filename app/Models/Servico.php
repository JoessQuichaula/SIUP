<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servicos';

    protected $fillable = [
        'id','nome','imagem','descricao'
    ];

    public function ServiceDocuments(){
        return $this->belongsToMany('App\Models\Documento');
    }

}
