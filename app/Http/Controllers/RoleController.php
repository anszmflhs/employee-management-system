<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
