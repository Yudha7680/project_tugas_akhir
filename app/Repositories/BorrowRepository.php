<?php

namespace App\Repositories;

use App\Models\Borrow;
use App\Repositories\BaseRepository;

/**
 * Class BorrowRepository
 * @package App\Repositories
 * @version June 29, 2021, 5:56 pm UTC
*/

class BorrowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'item_id',
        'total',
        'date_out',
        'date_in'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Borrow::class;
    }
}
