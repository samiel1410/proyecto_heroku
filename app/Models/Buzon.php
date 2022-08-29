<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Buzon
 *
 * @property $bar_id
 * @property $id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Bar $bar
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Buzon extends Model
{
    use SoftDeletes;

    static $rules = [
		'bar_id' => 'required',
		'descripcion' => 'required',
    'user_name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bar_id','descripcion','user_name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bar()
    {
        return $this->hasOne('App\Models\Bar', 'id', 'bar_id');
    }
    

}
