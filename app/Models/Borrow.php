<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Borrow
 * @package App\Models
 * @version June 29, 2021, 5:56 pm UTC
 *
 * @property integer $user_id
 * @property integer $item_id
 * @property integer $total
 * @property string $date_out
 * @property string $date_in
 */
class Borrow extends Model
{
    use SoftDeletes;

    public $table = 'borrows';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'item_id',
        'total',
        'date_out',
        'date_in'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'item_id' => 'integer',
        'total' => 'integer',
        'date_out' => 'string',
        'date_in' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
