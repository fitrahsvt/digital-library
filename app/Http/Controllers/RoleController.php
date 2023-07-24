<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('role.index', compact('roles'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        //masukkan data ke database
        $role = Role::create([
            'name' => $request->name
        ]);

        // redirect ke halaman role.index
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        Role::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect()->route('role.index');
    }
}
