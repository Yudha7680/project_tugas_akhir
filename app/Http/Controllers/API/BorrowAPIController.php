<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBorrowAPIRequest;
use App\Http\Requests\API\UpdateBorrowAPIRequest;
use App\Models\Borrow;
use App\Repositories\BorrowRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BorrowController
 * @package App\Http\Controllers\API
 */

class BorrowAPIController extends AppBaseController
{
    /** @var  BorrowRepository */
    private $borrowRepository;

    public function __construct(BorrowRepository $borrowRepo)
    {
        $this->borrowRepository = $borrowRepo;
    }

    /**
     * Display a listing of the Borrow.
     * GET|HEAD /borrows
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $borrows = $this->borrowRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($borrows->toArray(), 'Borrows retrieved successfully');
    }

    /**
     * Store a newly created Borrow in storage.
     * POST /borrows
     *
     * @param CreateBorrowAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBorrowAPIRequest $request)
    {
        $input = $request->all();

        $borrow = $this->borrowRepository->create($input);

        return $this->sendResponse($borrow->toArray(), 'Borrow saved successfully');
    }

    /**
     * Display the specified Borrow.
     * GET|HEAD /borrows/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Borrow $borrow */
        $borrow = $this->borrowRepository->find($id);

        if (empty($borrow)) {
            return $this->sendError('Borrow not found');
        }

        return $this->sendResponse($borrow->toArray(), 'Borrow retrieved successfully');
    }

    /**
     * Update the specified Borrow in storage.
     * PUT/PATCH /borrows/{id}
     *
     * @param int $id
     * @param UpdateBorrowAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBorrowAPIRequest $request)
    {
        $input = $request->all();

        /** @var Borrow $borrow */
        $borrow = $this->borrowRepository->find($id);

        if (empty($borrow)) {
            return $this->sendError('Borrow not found');
        }

        $borrow = $this->borrowRepository->update($input, $id);

        return $this->sendResponse($borrow->toArray(), 'Borrow updated successfully');
    }

    /**
     * Remove the specified Borrow from storage.
     * DELETE /borrows/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Borrow $borrow */
        $borrow = $this->borrowRepository->find($id);

        if (empty($borrow)) {
            return $this->sendError('Borrow not found');
        }

        $borrow->delete();

        return $this->sendSuccess('Borrow deleted successfully');
    }
}
