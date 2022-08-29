<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Snack
 *
 * @property $bar_id
 * @property $id
 * @property $nombre
 * @property $precio
 * @property $disponible
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Bar $bar
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Snack extends Model
{
    use SoftDeletes;

    static $rules = [
		'bar_id' => 'required',
		'nombre' => 'required',
		'precio' => 'required',
		'disponible' => 'required',
    'user_name' => 'required',
    'url' => 'required|image|max:2048',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bar_id','nombre','precio','disponible','user_name','url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bar()
    {
        return $this->hasOne('App\Models\Bar', 'id', 'bar_id');
    }
    

}
