<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserDetail
 * @package App\Models
 * @version June 29, 2021, 4:31 pm UTC
 *
 * @property foreign $user_id
 * @property integer $nik
 * @property string $seksie
 * @property string $photo
 */
class UserDetail extends Model
{
    use SoftDeletes;

    public $table = 'user_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'nik',
        'seksie',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nik' => 'integer',
        'seksie' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
}
