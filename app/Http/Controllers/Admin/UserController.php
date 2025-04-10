<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function listUser()
    {
        $listUser = User::paginate(5);
        return view('admin.users.ListUser', compact('listUser'));
    }
    public function addUser()
    {
        return view('admin.users.AddUser');
    }
    public function addPostUser(Request $req)
    {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'role' => $req->role,
        ];
        User::create($data);
        return redirect()->route('admin.users.listUser')
            ->with([
                'message' => 'Thêm mới thành công'
            ]);
    }
    public function deleteUser(Request $req)
    {
        User::where('id', $req->idUser)->delete();
        return redirect()->route('admin.users.listUser')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function updateUser($idUser)
    {
        $user = User::where('id', $idUser)->first();
        return view('admin.users.EditUser', compact('user'));
    }
    public function updatePatchUser($idUser, Request $req)
    {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'role' => $req->role,
        ];
        User::where('id', $idUser)->update($data);
        return redirect()->route('admin.users.listUser')
            ->with([
                'message' => 'Sửa thành công'
            ]);
    }
}
