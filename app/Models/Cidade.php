<?php

namespace App\Models;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cidade extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='cidades';

    protected $fillable=['nomeCidade'];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
