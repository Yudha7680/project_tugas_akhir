<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockOutAPIRequest;
use App\Http\Requests\API\UpdateStockOutAPIRequest;
use App\Models\StockOut;
use App\Repositories\StockOutRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StockOutController
 * @package App\Http\Controllers\API
 */

class StockOutAPIController extends AppBaseController
{
    /** @var  StockOutRepository */
    private $stockOutRepository;

    public function __construct(StockOutRepository $stockOutRepo)
    {
        $this->stockOutRepository = $stockOutRepo;
    }

    /**
     * Display a listing of the StockOut.
     * GET|HEAD /stockOuts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stockOuts = $this->stockOutRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stockOuts->toArray(), 'Stock Outs retrieved successfully');
    }

    /**
     * Store a newly created StockOut in storage.
     * POST /stockOuts
     *
     * @param CreateStockOutAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStockOutAPIRequest $request)
    {
        $input = $request->all();

        $stockOut = $this->stockOutRepository->create($input);

        return $this->sendResponse($stockOut->toArray(), 'Stock Out saved successfully');
    }

    /**
     * Display the specified StockOut.
     * GET|HEAD /stockOuts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StockOut $stockOut */
        $stockOut = $this->stockOutRepository->find($id);

        if (empty($stockOut)) {
            return $this->sendError('Stock Out not found');
        }

        return $this->sendResponse($stockOut->toArray(), 'Stock Out retrieved successfully');
    }

    /**
     * Update the specified StockOut in storage.
     * PUT/PATCH /stockOuts/{id}
     *
     * @param int $id
     * @param UpdateStockOutAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockOutAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockOut $stockOut */
        $stockOut = $this->stockOutRepository->find($id);

        if (empty($stockOut)) {
            return $this->sendError('Stock Out not found');
        }

        $stockOut = $this->stockOutRepository->update($input, $id);

        return $this->sendResponse($stockOut->toArray(), 'StockOut updated successfully');
    }

    /**
     * Remove the specified StockOut from storage.
     * DELETE /stockOuts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StockOut $stockOut */
        $stockOut = $this->stockOutRepository->find($id);

        if (empty($stockOut)) {
            return $this->sendError('Stock Out not found');
        }

        $stockOut->delete();

        return $this->sendSuccess('Stock Out deleted successfully');
    }
}
