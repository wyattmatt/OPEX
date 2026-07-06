<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_departments' => Department::count(),
            'total_users' => User::count(),
            'active_products' => Product::whereHas('statusModel', function ($query) {
                $query->where('code', Product::STATUS_ACTIVE);
            })->count(),
        ];

        return view('dashboard', compact('stats'));
    }
}
