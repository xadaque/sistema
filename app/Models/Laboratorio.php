<?php

namespace App\Models;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratorio extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table='laboratorios';

    protected $fillable=['endereco_id','nomeLaboratorio','telefone1Laboratorio','telefone2Laboratorio','active'];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }


}
