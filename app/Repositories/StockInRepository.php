<?php

namespace App\Repositories;

use App\Models\StockIn;
use App\Repositories\BaseRepository;

/**
 * Class StockInRepository
 * @package App\Repositories
 * @version June 29, 2021, 5:46 pm UTC
*/

class StockInRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'item_id',
        'supplier_id',
        'created_by',
        'total',
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
        return StockIn::class;
    }
}
