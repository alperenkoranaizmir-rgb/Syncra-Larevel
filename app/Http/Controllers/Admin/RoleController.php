<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    // Search endpoint for Select2 AJAX
    public function search(Request $request)
    {
        $q = $request->input('q', '');
        $page = max(1, (int) $request->input('page', 1));
        $perPage = 20;

        $query = Role::query();
        if (!empty($q)) {
            $query->where('name', 'like', "%{$q}%");
        }

        $total = $query->count();
        $results = $query->orderBy('name')->skip(($page-1)*$perPage)->take($perPage)->get();

        $items = $results->map(function ($r) {
            return ['id' => $r->name, 'text' => $r->name];
        })->values();

        return response()->json([
            'results' => $items,
            'pagination' => ['more' => ($page*$perPage) < $total],
        ]);
    }

    // Return roles for a given user in Select2 format
    public function userRoles(User $user)
    {
        $items = collect([]);
        if (method_exists($user, 'getRoleNames')) {
            $items = $user->getRoleNames()->map(function ($r) {
                return ['id' => $r, 'text' => $r];
            })->values();
        }

        return response()->json(['results' => $items]);
    }

    // Create a new role (AJAX) — returns created role in Select2 format
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100|unique:roles,name'
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        return response()->json(['id' => $role->name, 'text' => $role->name]);
    }
}
