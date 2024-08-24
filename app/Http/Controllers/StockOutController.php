<?php

namespace App\Http\Controllers;

use App\DataTables\StockOutDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStockOutRequest;
use App\Http\Requests\UpdateStockOutRequest;
use App\Repositories\StockOutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Auth;
use App\Models\Item;
class StockOutController extends AppBaseController
{
    /** @var  StockOutRepository */
    private $stockOutRepository;

    public function __construct(StockOutRepository $stockOutRepo)
    {
        $this->stockOutRepository = $stockOutRepo;

        $this->item = Item::pluck('name', 'id');
    }

    /**
     * Display a listing of the StockOut.
     *
     * @param StockOutDataTable $stockOutDataTable
     * @return Response
     */
    public function index(StockOutDataTable $stockOutDataTable)
    {
        return $stockOutDataTable->render('stock_outs.index');
    }

    /**
     * Show the form for creating a new StockOut.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_outs.create')
            ->with('user', Auth::user())
            ->with('item', $this->item);
    }

    /**
     * Store a newly created StockOut in storage.
     *
     * @param CreateStockOutRequest $request
     *
     * @return Response
     */
    public function store(CreateStockOutRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();

        $stockOut = $this->stockOutRepository->create($input);

        Flash::success('Stock Out saved successfully.');

        return redirect(route('stockOuts.index'));
    }

    /**
     * Display the specified StockOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockOut = $this->stockOutRepository->find($id);

        if (empty($stockOut)) {
            Flash::error('Stock Out not found');

            return redirect(route('stockOuts.index'));
        }

        return view('stock_outs.show')->with('stockOut', $stockOut);
    }

    /**
     * Show the form for editing the specified StockOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockOut = $this->stockOutRepository->find($id);

        if (empty($stockOut)) {
            Flash::error('Stock Out not found');

            return redirect(route('stockOuts.index'));
        }

        return view('stock_outs.edit')
            ->with('user', Auth::user())
            ->with('item', $this->item)
            ->with('stockOut', $stockOut);
    }

    /**
     * Update the specified StockOut in storage.
     *
     * @param  int              $id
     * @param UpdateStockOutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockOutRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();

        $stockOut = $this->stockOutRepository->find($id);

        if (empty($stockOut)) {
            Flash::error('Stock Out not found');

            return redirect(route('stockOuts.index'));
        }

        $stockOut = $this->stockOutRepository->update($input, $id);

        Flash::success('Stock Out updated successfully.');

        return redirect(route('stockOuts.index'));
    }

    /**
     * Remove the specified StockOut from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockOut = $this->stockOutRepository->find($id);

        if (empty($stockOut)) {
            Flash::error('Stock Out not found');

            return redirect(route('stockOuts.index'));
        }

        $this->stockOutRepository->delete($id);

        Flash::success('Stock Out deleted successfully.');

        return redirect(route('stockOuts.index'));
    }
}
