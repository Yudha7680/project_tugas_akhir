<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockInAPIRequest;
use App\Http\Requests\API\UpdateStockInAPIRequest;
use App\Models\StockIn;
use App\Repositories\StockInRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StockInController
 * @package App\Http\Controllers\API
 */

class StockInAPIController extends AppBaseController
{
    /** @var  StockInRepository */
    private $stockInRepository;

    public function __construct(StockInRepository $stockInRepo)
    {
        $this->stockInRepository = $stockInRepo;
    }

    /**
     * Display a listing of the StockIn.
     * GET|HEAD /stockIns
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stockIns = $this->stockInRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stockIns->toArray(), 'Stock Ins retrieved successfully');
    }

    /**
     * Store a newly created StockIn in storage.
     * POST /stockIns
     *
     * @param CreateStockInAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStockInAPIRequest $request)
    {
        $input = $request->all();

        $stockIn = $this->stockInRepository->create($input);

        return $this->sendResponse($stockIn->toArray(), 'Stock In saved successfully');
    }

    /**
     * Display the specified StockIn.
     * GET|HEAD /stockIns/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StockIn $stockIn */
        $stockIn = $this->stockInRepository->find($id);

        if (empty($stockIn)) {
            return $this->sendError('Stock In not found');
        }

        return $this->sendResponse($stockIn->toArray(), 'Stock In retrieved successfully');
    }

    /**
     * Update the specified StockIn in storage.
     * PUT/PATCH /stockIns/{id}
     *
     * @param int $id
     * @param UpdateStockInAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockInAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockIn $stockIn */
        $stockIn = $this->stockInRepository->find($id);

        if (empty($stockIn)) {
            return $this->sendError('Stock In not found');
        }

        $stockIn = $this->stockInRepository->update($input, $id);

        return $this->sendResponse($stockIn->toArray(), 'StockIn updated successfully');
    }

    /**
     * Remove the specified StockIn from storage.
     * DELETE /stockIns/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StockIn $stockIn */
        $stockIn = $this->stockInRepository->find($id);

        if (empty($stockIn)) {
            return $this->sendError('Stock In not found');
        }

        $stockIn->delete();

        return $this->sendSuccess('Stock In deleted successfully');
    }
}
