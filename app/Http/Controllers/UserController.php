<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\StorageFileTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StorageFileTrait;
    private $user;
    private $role;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = new User;
        $this->role = new Role;
    }
    public function index()
    {
        $users = $this->user->paginate(5);
        return view('admin.manage.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all();
        return view('admin.manage.users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userMapping = [
            'id_card_number' => $request->id_card_number,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'display_name' => $request->display_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'salary' => $request->salary,
            'desciption' => $request->desciption,
            'skill' => $request->skill,
            'education' => $request->education,
            'dob' => $request->dob
        ];
        $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'photos/users/' . $request->username . '/avatar');
        if (!empty($avatarImageUploaded)) {
            $userMapping['avatar_path'] = $avatarImageUploaded['file_path'];
            $userMapping['avatar_name'] = $avatarImageUploaded['file_name'];
        }
        $contractImageUploaded = $this->storageFileUpload($request, 'contract_image_path', 'photos/users/' . $request->username . '/contract');
        if (!empty($contractImageUploaded)) {
            $userMapping['contract_image_path'] = $contractImageUploaded['file_path'];
            $userMapping['contract_image_name'] = $contractImageUploaded['file_name'];
        }
        $userCreated = $this->user->create($userMapping);
        $userCreated->roles()->attach($request->role_id);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }
    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
