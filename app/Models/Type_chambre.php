<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_chambre extends Model
{

    protected $fillable = ["type_chambre", "description"] ;

    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }
}
