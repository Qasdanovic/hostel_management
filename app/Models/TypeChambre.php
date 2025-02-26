<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeChambre extends Model
{

    protected $fillable = ["type_chambre", "description"] ;

    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }
}
