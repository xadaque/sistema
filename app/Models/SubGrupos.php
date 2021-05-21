<?php

namespace App\Models;

use App\Models\Associados;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubGrupos extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $table = 'SubGrupos';
    protected $primaryKey = 'SubGrupo';

    public function associados()
    {
        return $this->hasOne(Associados::class);
    }
}
