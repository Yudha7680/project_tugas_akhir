<?php

namespace App\Http\Controllers;

use App\DataTables\UserDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserDetailRequest;
use App\Http\Requests\UpdateUserDetailRequest;
use App\Repositories\UserDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Role;

class UserDetailController extends AppBaseController
{
    /** @var  UserDetailRepository */
    private $userDetailRepository;

    public function __construct(UserDetailRepository $userDetailRepo)
    {
        $this->userDetailRepository = $userDetailRepo;
        $this->role = Role::pluck('name', 'id');
        $this->seksie = [
            'superintendent' => 'SUPERINTENDENT',
            'spv m1s' => 'SPV M1S',
            'spv m1d' => 'SPV M1D',
            'spv mdsf' => 'SPV MDSF',
            'spv eisf' => 'SPV EISF'
        ];
    }

    /**
     * Display a listing of the UserDetail.
     *
     * @param UserDetailDataTable $userDetailDataTable
     * @return Response
     */
    public function index(UserDetailDataTable $userDetailDataTable)
    {
        return $userDetailDataTable->render('user_details.index');
    }

    /**
     * Show the form for creating a new UserDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_details.create')
                ->with('seksie', $this->seksie)
                ->with('role', $this->role);
    }

    /**
     * Store a newly created UserDetail in storage.
     *
     * @param CreateUserDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateUserDetailRequest $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $user = User::create([
            'role_id' => $input['role_id'],
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $this->unsetItem($input);
        
        $file = $this->saveImage($request->file('photo'), 'user');

        $input['user_id'] = $user->id;
        $input['photo'] = $file;

        $userDetail = $this->userDetailRepository->create($input);

        Flash::success('User Detail saved successfully.');

        return redirect(route('userDetails.index'));
    }

    /**
     * Display the specified UserDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userDetail = $this->userDetailRepository->find($id);

        if (empty($userDetail)) {
            Flash::error('User Detail not found');

            return redirect(route('userDetails.index'));
        }

        return view('user_details.show')->with('userDetail', $userDetail);
    }

    /**
     * Show the form for editing the specified UserDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userDetail = $this->userDetailRepository->find($id);
        $user = User::whereId($id)->first();

        $userDetail->name = $user->name;
        $userDetail->email = $user->email;
        
        if (empty($userDetail)) {
            Flash::error('User Detail not found');

            return redirect(route('userDetails.index'));
        }

        return view('user_details.edit')
                ->with('role', $this->role)
                ->with('seksie', $this->seksie)
                ->with('userDetail', $userDetail);
    }

    /**
     * Update the specified UserDetail in storage.
     *
     * @param  int              $id
     * @param UpdateUserDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserDetailRequest $request)
    {
        $input = $request->all();

        $userDetail = $this->userDetailRepository->find($id);

        if (empty($userDetail)) {
            Flash::error('User Detail not found');

            return redirect(route('userDetails.index'));
        }

        if($input['password'] != '' && $input['password_confirmation'] != ''){
            $this->validate($request, [
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ]);
            $user = User::whereId($id)->update([
                'role_id' => $input['role_id'],
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
        }else {
            $user = User::whereId($id)->update([
                'role_id' => $input['role_id'],
                'name' => $input['name'],
                'email' => $input['email'],
            ]);
        }


        $file = $this->saveImage($request->file('photo'), 'user', true, $userDetail->photo);

        $input['photo'] = $file;

        $userDetail = $this->userDetailRepository->update($input, $id);


        Flash::success('User Detail updated successfully.');

        return redirect(route('userDetails.index'));
    }

    /**
     * Remove the specified UserDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userDetail = $this->userDetailRepository->find($id);

        if (empty($userDetail)) {
            Flash::error('User Detail not found');

            return redirect(route('userDetails.index'));
        }

        $this->userDetailRepository->delete($id);

        Flash::success('User Detail deleted successfully.');

        return redirect(route('userDetails.index'));
    }

    private function unsetItem($input)
    {
        unset($input['role_id']);
        unset($input['name']);
        unset($input['email']);
        unset($input['password']);
        unset($input['password_confirmation']);
    }

    private function saveImage($image, $storage, $isUpdate = false , $model = "") {
        $dir = Storage::directories();

        if (!in_array('public/'.$storage.'/' , $dir)) {
            Storage::makeDirectory('public/'.$storage.'/');
        }

        if(!empty($image)) {
            $fileImg = uniqid() . '.' . $image->getClientOriginalExtension();
            if ($isUpdate) {
                @Storage::delete('public/'.$storage.'/' . $model);
            }
            Storage::put('public/'.$storage.'/' . $fileImg, File::get($image));
            $image = $fileImg;
        }else{
            if ($isUpdate) {
                $image = $model;
            }else {
                $image = NULL;
            }
        }
        return $image;
    }

}
