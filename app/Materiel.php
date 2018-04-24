<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    /** @var string $table */
    protected $table='materiels';
    /** @var array $fillable */
    protected $fillable = ['nom', 'description','fiche', 'liens', 'magasin','categorie_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    /**
     * return all images belongs to on materiel
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images() {
        return $this->hasMany(Image::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaires::class);
    }

    /**
     * return all active images
     */
    public function imagesActive()
    {
        return $this->hasMany(Image::class)->where('is_active', true);
    }


}
