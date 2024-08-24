<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StockIn
 * @package App\Models
 * @version June 29, 2021, 5:46 pm UTC
 *
 * @property integer $item_id
 * @property integer $supplier_id
 * @property integer $created_by
 * @property integer $total
 * @property string $date_in
 */
class StockIn extends Model
{
    use SoftDeletes;

    public $table = 'stock_ins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'item_id',
        'supplier_id',
        'created_by',
        'total',
        'date_in'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item_id' => 'integer',
        'supplier_id' => 'integer',
        'created_by' => 'integer',
        'total' => 'integer',
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
    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    
}
