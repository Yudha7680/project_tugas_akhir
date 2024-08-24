<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 * @package App\Models
 * @version June 29, 2021, 5:32 pm UTC
 *
 * @property string $name
 * @property string $code
 * @property string $specification
 * @property string $photo
 * @property string $status
 * @property integer $total
 * @property string $description
 */
class Item extends Model
{
    use SoftDeletes;

    public $table = 'items';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'code',
        'specification',
        'photo',
        'status',
        'total',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
        'specification' => 'string',
        'photo' => 'string',
        'status' => 'string',
        'total' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
