<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $rolecount = Role::count();
        return view('user.index', compact('users', 'rolecount'));
    }

    public function create()
    {
        $role = Role::all();
        return view('user.create', compact('role'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'role' => 'required',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:8',
            'address' => 'required|string|min:10',
            'birth' => 'required',
            'gender' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $imageName = time().'.'.$request->avatar->extension();

        // upload file gambar ke folder slider
        Storage::putFileAs('public/user', $request->file('avatar'), $imageName);

        $user = User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'avatar' => $imageName,
            'address' => $request->address,
            'birth' => $request->birth,
            'gender' =>  $request->gender
        ]);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::all();
        return view('user.edit', compact('user', 'role'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'role' => 'required',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:8',
            'address' => 'required|string|min:10',
            'birth' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile('avatar')) {
            // ambil nama file gambar lama dari database
            $gambar_lama = User::find($id)->avatar;

            //hapus file gambar lama
            Storage::delete('public/user/'.$gambar_lama);

            // ubah nama file gambar dengan angka random
            $imageName = time().'.'.$request->avatar->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/user', $request->file('avatar'), $imageName);

            User::where('id', $id)->update([
                'role_id' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password,
                'avatar' => $imageName,
                'address' => $request->address,
                'birth' => $request->birth,
                'gender' =>  $request->gender
            ]);

        }else{
            User::where('id', $id)->update([
                'role_id' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password,
                'address' => $request->address,
                'birth' => $request->birth,
                'gender' =>  $request->gender
            ]);
        }

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        Storage::delete('public/user/'.$user->avatar);

        User::where('id', $id)->delete();
        return redirect()->route('user.index');
    }

    public function editprofile($id){
        $user = User::find($id);
        return view('user.editprofile', compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'address' => 'required|string|min:10',
            'birth' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile('avatar')) {
            // ambil nama file gambar lama dari database
            $gambar_lama = User::find($id)->avatar;

            //hapus file gambar lama
            Storage::delete('public/user/'.$gambar_lama);

            // ubah nama file gambar dengan angka random
            $imageName = time().'.'.$request->avatar->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/user', $request->file('avatar'), $imageName);

            User::where('id', $id)->update([
                'avatar' => $imageName,
                'address' => $request->address,
                'birth' => $request->birth,
                'gender' =>  $request->gender
            ]);

        }else{
            User::where('id', $id)->update([
                'address' => $request->address,
                'birth' => $request->birth,
                'gender' =>  $request->gender
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function detail($id)
    {
        $user = User::find($id);

        return view('user.detail', compact('user'));
    }

}
