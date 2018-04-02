<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    protected $table='commentaires';
    protected $fillable = ['commentaire', 'materiel_id', 'user_id'];

    public function materiel()
    {
        return $this->belongsTo('App\Materiel');
    }

}
