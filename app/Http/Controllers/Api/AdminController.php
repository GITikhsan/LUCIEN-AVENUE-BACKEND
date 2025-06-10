<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Implementasi CRUD standar, mirip dengan UserController
    public function index()
    {
        $admins = Admin::paginate(10);
        return response()->json(['status' => true, 'data' => $admins], 200);
    }
}
