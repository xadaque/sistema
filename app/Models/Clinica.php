<?php

namespace App\Models;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clinica extends Model
{
    use HasFactory;

    protected $table='clinicas';
    protected $fillable=['endereco_id','name','telefone1','telefone2','active'];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
