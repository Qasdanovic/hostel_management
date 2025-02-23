<?php

namespace App\Models;

use App\Models\Type_chambre;
use App\Models\Tarif_chambre;
use App\Models\Capacite_chambre;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $guarded = [] ;
    protected $table = "chambres" ;

    public function type()
    {
        return $this->belongsTo(Type_chambre::class, 'type_chmabre_id', 'id');
    }

    public function capacite()
    {
        return $this->belongsTo(Capacite_chambre::class, 'capacite_chmabre_id', 'id');
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif_chambre::class, 'tarif_chmabre_id', 'id');
    }
}
