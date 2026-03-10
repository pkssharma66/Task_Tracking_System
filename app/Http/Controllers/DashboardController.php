<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

class DashboardController extends Controller
{
    public function index()
    {
      $menus = MenuModel::where('parent_id', 0)
            ->where('status', 1)
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        return view('dashboard', compact('menus'));
    }
}
