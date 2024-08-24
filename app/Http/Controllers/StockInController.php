<?php

namespace App\Http\Controllers;

use App\DataTables\StockInDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStockInRequest;
use App\Http\Requests\UpdateStockInRequest;
use App\Repositories\StockInRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Auth;
use App\Models\Supplier;
use App\Models\Item;

class StockInController extends AppBaseController
{
    /** @var  StockInRepository */
    private $stockInRepository;

    public function __construct(StockInRepository $stockInRepo)
    {
        $this->stockInRepository = $stockInRepo;
        $this->supplier = Supplier::pluck('name', 'id');
        $this->item = Item::pluck('name', 'id');
    }

    /**
     * Display a listing of the StockIn.
     *
     * @param StockInDataTable $stockInDataTable
     * @return Response
     */
    public function index(StockInDataTable $stockInDataTable)
    {
        return $stockInDataTable->render('stock_ins.index');
    }

    /**
     * Show the form for creating a new StockIn.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_ins.create')
                ->with('user', Auth::user())
                ->with('item', $this->item)
                ->with('supplier', $this->supplier);
    }

    /**
     * Store a newly created StockIn in storage.
     *
     * @param CreateStockInRequest $request
     *
     * @return Response
     */
    public function store(CreateStockInRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::id();
        $stockIn = $this->stockInRepository->create($input);

        Flash::success('Stock In saved successfully.');

        return redirect(route('stockIns.index'));
    }

    /**
     * Display the specified StockIn.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockIn = $this->stockInRepository->find($id);

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        return view('stock_ins.show')->with('stockIn', $stockIn);
    }

    /**
     * Show the form for editing the specified StockIn.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockIn = $this->stockInRepository->find($id);

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        return view('stock_ins.edit')
                ->with('user', Auth::user())
                ->with('item', $this->item)
                ->with('supplier', $this->supplier)
                ->with('stockIn', $stockIn);
    }

    /**
     * Update the specified StockIn in storage.
     *
     * @param  int              $id
     * @param UpdateStockInRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockInRequest $request)
    {
        $stockIn = $this->stockInRepository->find($id);

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        $input = $request->all();
        $input['created_by'] = Auth::id();

        $stockIn = $this->stockInRepository->update($input, $id);

        Flash::success('Stock In updated successfully.');

        return redirect(route('stockIns.index'));
    }

    /**
     * Remove the specified StockIn from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockIn = $this->stockInRepository->find($id);

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        $this->stockInRepository->delete($id);

        Flash::success('Stock In deleted successfully.');

        return redirect(route('stockIns.index'));
    }
}
