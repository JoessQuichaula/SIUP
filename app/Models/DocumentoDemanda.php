<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DocumentoDemanda extends Model
{
    protected $table = "documento_demanda";

    protected $fillable = [
        'id','demanda_id','ficheiro','thumbnail','documento_id'
    ];
}
