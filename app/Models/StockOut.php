<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StockOut
 * @package App\Models
 * @version June 29, 2021, 5:53 pm UTC
 *
 * @property integer $item_id
 * @property integer $user_id
 * @property string $date_out
 * @property integer $total
 * @property string $location
 * @property string $description
 */
class StockOut extends Model
{
    use SoftDeletes;

    public $table = 'stock_outs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'item_id',
        'user_id',
        'date_out',
        'total',
        'location',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item_id' => 'integer',
        'user_id' => 'integer',
        'date_out' => 'string',
        'total' => 'integer',
        'location' => 'string',
        'description' => 'string'
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
