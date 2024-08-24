<?php

namespace App\Repositories;

use App\Models\StockOut;
use App\Repositories\BaseRepository;

/**
 * Class StockOutRepository
 * @package App\Repositories
 * @version June 29, 2021, 5:53 pm UTC
*/

class StockOutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'item_id',
        'user_id',
        'date_out',
        'total',
        'location',
        'description'
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
        return StockOut::class;
    }
}
