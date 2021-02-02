<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Demanda extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];
    protected $table = "demandas";

    protected $fillable = [
        'id','reparticao_id','servico_id','estado'
    ];

    public function scopeCurrentUser($query)
    {
        if(Auth::user()->id != 1){
            return $query->where('reparticao_id', Auth::user()->reparticao_id);
        }
    }

}
