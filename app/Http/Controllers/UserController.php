<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Session;
use DB;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $with = ['role'];
        $dataSelect = [
            'id',
            'name',
            'birthday',
            'id_number',
            'id_address',
            'job',
            'company',
            'email',
            'role_id',
        ];
        $users = $this->user->getData($with, [], $dataSelect);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = function() use ($request) {
            try {
                $data = $request->except(['password_confirmation']);
                $data['password'] = bcrypt($request->password);
                $data['avatar'] = $this->user->handleUploadImage(true, $request->file('avatar'));
                $this->user->create($data);
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Tạo tài khoản không thành công');
            }
        };

        DB::transaction($user, 5);

        Session::flash('success', 'Người dùng đã được lưu thành công!');

        return redirect()->route('users.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->findById($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findById($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = $this->user->findById($id);
        $user = function() use ($request, $id, $user_id) {
            $data = $request->all();
            try {
                if (isset($data['change_password']) && $data['change_password'] == 'on') {
                    $data['password'] = $request->validate([
                        'password' => 'required|confirmed|min:6',
                    ]);
                    $data['password'] = bcrypt($request->password);
                }
                $data['avatar'] = $this->user->handleUploadImage(false, $request->file('avatar'), $user_id);

                unset($data['change_password'], $data['password_confirmation']);

                $this->user->update($id, $data);
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Tài khoản không cập nhật thành công');
            }
        };

        DB::transaction($user, 5);

        Session::flash('success', 'Người dùng đã được cập nhật thành công!');

        return redirect()->route('users.show', $user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
