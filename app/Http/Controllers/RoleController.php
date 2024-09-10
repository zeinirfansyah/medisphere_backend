<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Role::query();

            if ($request->has('search')) {
                $search = $request->input('search');

                $query->where('role_name', 'like', "%{$search}%");
            }

            $per_page = $request->input('per_page', 2);
            $roles = $query->paginate($per_page);

            $response = [
                'message' => 'success',
                'status_code' => 200,
                'data' => $roles
            ];

            return response($response, 200);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'role_name' => 'required|string|unique:roles,role_name',
            ]);

            $role = Role::create($fields);

            return response([
                'message' => 'Role created successfully',
                'status_code' => 201,
                'data' => $role
            ], 201);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        try {
            return response([
                'message' => 'success',
                'status_code' => 200,
                'data' => $role
            ], 200);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
