<?php

namespace App\Models;

use App\Models\SubGrupos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Associados extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $table = 'Associados';
    protected $primaryKey = 'Inscricao';

    protected $fillable=['Inscricao','Nome','SubGrupo','Status','Cobranca'];

    public function subgrupo()
    {
        return $this->belongsTo(SubGrupos::class);
    }

}
