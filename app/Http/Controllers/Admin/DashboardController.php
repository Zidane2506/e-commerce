<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        $category = Category::count();
        $product = Product::count();
        $user = User::where('role', 'user')->count();
        $users = User::where('role', 'user')->get();
        
        return view('pages.admin.index', compact(
            'category',
            'product',
            'user',
            'users'
        ));
    }

    public function listUser ()
    {
        $user = User::where('role','user')->get();

        return view('pages.admin.adminUser.listUser', compact('user'));

    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make('password');
        $user->save();

        return redirect()->back()->with('success', 'Reset Success');
    }
}
