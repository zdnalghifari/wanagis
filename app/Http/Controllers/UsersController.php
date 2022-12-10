<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back();
        } catch (\Throwable $th) {
            return back()->with('error', 'Tidak dapat menghapus');
        }
    }
}
