<?php

namespace App\Models;

use App\Models\Laboratorio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cidade;

class Endereco extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table='enderecos';

    protected $fillable=['logradouro','bairro','numero','complemento','cidade_id'];

    public function id()
    {
        return $this->hasOne(Laboratorio::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function clinica()
    {
        return $this->hasOne(Clinica::class);
    }

}
