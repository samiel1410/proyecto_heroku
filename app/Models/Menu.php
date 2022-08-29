<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 *
 * @property $bar_id
 * @property $id
 * @property $nombre
 * @property $precio
 * @property $disponible
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Bar $bar
 * @property Preferencia[] $preferencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Menu extends Model
{
    use SoftDeletes;

    static $rules = [
		'bar_id' => 'required',
		'nombre' => 'required',
		'precio' => 'required',
		'disponible' => 'required',
        'url' => 'required|image|max:2048',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bar_id','nombre','precio','disponible','descripcion','url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bar()
    {
        return $this->hasOne('App\Models\Bar', 'id', 'bar_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preferencias()
    {
        return $this->hasMany('App\Models\Preferencia', 'menu_id', 'id');
    }
    

}
