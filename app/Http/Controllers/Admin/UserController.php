<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        $users = User::with('roles')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name');
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'username' => 'nullable|string|max:50',
            'tckn' => 'nullable|string|max:11',
            'phone' => 'nullable|string|max:30',
            'is_admin' => 'nullable|boolean',
            'roles' => 'nullable|array',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'] ?? null,
            'tckn' => $data['tckn'] ?? null,
            'phone' => $data['phone'] ?? null,
            'is_admin' => !empty($data['is_admin']),
        ]);

        if (!empty($data['roles']) && method_exists($user, 'syncRoles')) {
            $user->syncRoles($data['roles']);
        }

        return redirect()->route('admin.users.index')->with('status', 'Kullanıcı oluşturuldu.');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name');
        return view('admin.users.edit', compact('user','roles'));
    }

    public function show(User $user)
    {
        // Simple show: redirect to edit form for now
        return redirect()->route('admin.users.edit', $user);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'username' => 'nullable|string|max:50',
            'tckn' => 'nullable|string|max:11',
            'phone' => 'nullable|string|max:30',
            'is_admin' => 'nullable|boolean',
            'roles' => 'nullable|array',
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->username = $data['username'] ?? null;
        $user->tckn = $data['tckn'] ?? null;
        $user->phone = $data['phone'] ?? null;
        $user->is_admin = !empty($data['is_admin']);

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        if (method_exists($user, 'syncRoles')) {
            $user->syncRoles($data['roles'] ?? []);
        }

        return redirect()->route('admin.users.index')->with('status', 'Kullanıcı güncellendi.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('status', 'Kullanıcı silindi.');
    }
}
