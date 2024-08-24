<?php

namespace App\Models;

use Eloquent as Model;

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
class User extends Model
{
    public $table = 'users';
    

    public $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
