<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Preferencia
 *
 * @property $menu_id
 * @property $id
 * @property $fecha
 * @property $observacion
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Menu $menu
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Preferencia extends Model
{
    use SoftDeletes;

    static $rules = [
		'menu_id' => 'required',
		'fecha' => 'required',
		'observacion' => 'required',
    'user_name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['menu_id','fecha','observacion','user_name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menu()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'menu_id');
    }
    

}
