<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @var string $table */
    protected $table = 'images';
    /** @var array $fillable */
    protected $fillable = ['name', 'materiel_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materiel() {
        return $this->belongsTo(Materiel::class);
    }

}
