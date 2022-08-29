<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bar
 *
 * @property $campus_id
 * @property $id
 * @property $nombre
 * @property $abierto
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Buzon[] $buzons
 * @property Campus $campus
 * @property Menu[] $menuses
 * @property Snack[] $snacks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bar extends Model
{
    use SoftDeletes;
    

    static $rules = [
		'nombre' => 'required',
		'abierto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['campus_id','nombre','abierto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buzons()
    {
        return $this->hasMany('App\Models\Buzon', 'bar_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function campus()
    {
        return $this->hasOne('App\Models\Campus', 'id', 'campus_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuses()
    {
        return $this->hasMany('App\Models\Menu', 'bar_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function snacks()
    {
        return $this->hasMany('App\Models\Snack', 'bar_id', 'id');
    }
    

}
