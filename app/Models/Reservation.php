<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [] ;

    public function chambre()
    {
        return $this->belongsTo(Chambre::class, "chambre_id", "id");
    }

    public function client()
    {
        return $this->belongsTo(Client::class, "client_id", "id");
    }

    
    
}
