<?php

namespace App\Models;

use App\Models\TypeChambre;
use App\Models\TarifChambre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $guarded = [] ;
    protected $table = "chambres" ;

    public function type()
    {
        return $this->belongsTo(TypeChambre::class, 'type_chambre_id', 'id');
    }

    public function capacite()
    {
        return $this->belongsTo(CapaciteChambre::class, 'capacite_chambre_id', 'id');
    }

    public function tarif()
    {
        return $this->belongsTo(TarifChambre::class, 'tarif_chambre_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, "chambre_id");
    }
}
