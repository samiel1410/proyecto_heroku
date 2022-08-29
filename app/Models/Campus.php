<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Campus
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Bar[] $bars
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Campus extends Model
{
    use SoftDeletes;

    

    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bars()
    {
        return $this->hasMany('App\Models\Bar', 'campus_id', 'id');
    }
    

}
