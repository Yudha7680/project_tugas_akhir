<?php

namespace App\Http\Controllers;

use App\DataTables\BorrowDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBorrowRequest;
use App\Http\Requests\UpdateBorrowRequest;
use App\Repositories\BorrowRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\User;
use App\Models\Item;

class BorrowController extends AppBaseController
{
    /** @var  BorrowRepository */
    private $borrowRepository;

    public function __construct(BorrowRepository $borrowRepo)
    {
        $this->borrowRepository = $borrowRepo;
        $this->user = User::pluck('name', 'id');
        $this->item = Item::pluck('name', 'id');
    }

    /**
     * Display a listing of the Borrow.
     *
     * @param BorrowDataTable $borrowDataTable
     * @return Response
     */
    public function index(BorrowDataTable $borrowDataTable)
    {
        return $borrowDataTable->render('borrows.index');
    }

    /**
     * Show the form for creating a new Borrow.
     *
     * @return Response
     */
    public function create()
    {
        return view('borrows.create')
                ->with('user', $this->user)
                ->with('item', $this->item);
    }

    /**
     * Store a newly created Borrow in storage.
     *
     * @param CreateBorrowRequest $request
     *
     * @return Response
     */
    public function store(CreateBorrowRequest $request)
    {
        $input = $request->all();

        $borrow = $this->borrowRepository->create($input);

        Flash::success('Borrow saved successfully.');

        return redirect(route('borrows.index'));
    }

    /**
     * Display the specified Borrow.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $borrow = $this->borrowRepository->find($id);

        if (empty($borrow)) {
            Flash::error('Borrow not found');

            return redirect(route('borrows.index'));
        }

        return view('borrows.show')->with('borrow', $borrow);
    }

    /**
     * Show the form for editing the specified Borrow.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $borrow = $this->borrowRepository->find($id);

        if (empty($borrow)) {
            Flash::error('Borrow not found');

            return redirect(route('borrows.index'));
        }

        return view('borrows.edit')
                ->with('user', $this->user)
                ->with('item', $this->item)
                ->with('borrow', $borrow);
    }

    /**
     * Update the specified Borrow in storage.
     *
     * @param  int              $id
     * @param UpdateBorrowRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBorrowRequest $request)
    {
        $input = $request->all();

        $borrow = $this->borrowRepository->find($id);

        if (empty($borrow)) {
            Flash::error('Borrow not found');

            return redirect(route('borrows.index'));
        }

        $borrow = $this->borrowRepository->update($input, $id);

        Flash::success('Borrow updated successfully.');

        return redirect(route('borrows.index'));
    }

    /**
     * Remove the specified Borrow from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $borrow = $this->borrowRepository->find($id);

        if (empty($borrow)) {
            Flash::error('Borrow not found');

            return redirect(route('borrows.index'));
        }

        $this->borrowRepository->delete($id);

        Flash::success('Borrow deleted successfully.');

        return redirect(route('borrows.index'));
    }
}
