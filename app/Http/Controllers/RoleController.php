<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function ($row) {
                    $btn = '<a href="javascript:void(0)"id="' . $row->id .'" class="btn btn-warning btn-sm mr-2 edit-button">Edit</a>';
                    $btn .= '<a href="javascript:void(0)"id="' . $row->id .'" class="btn btn-danger btn-sm delete-button">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('admin.role.index');
    }

    public function store (Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()
                ],
                400
            );
        }

        $role = Role::create(
            [
                'name' => $data['name'],
            ]
        );

        return response()->json([
            'status' => true,
            'data' => $role,
        ]);
    }
    public function edit($id)
    {
        $role = Role::findById($id);
        return response()->json(['data' => $role]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles',

        ], [
                'name.required' => 'nama Role tidak boleh kosong!',

            ]);

        if ($validator->passes()) {
            Role::findById($id)->update($request->all());

            return response()->json(['message' => 'Data berhasil diupdate!']);
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return response()->json(['message' => 'Data berhasil dihapus!']);
    }

}
