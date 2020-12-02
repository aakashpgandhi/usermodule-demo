<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $vendors        =  Vendor::count();
        $users          =  User::count();
        $userRecent     =  User::orderBy('id', 'desc')->take(10)->get();
        $vendorRecent   =  Vendor::orderBy('id', 'desc')->take(10)->get();

        return view('admin', compact('vendors','users','userRecent','vendorRecent'));
    }

}
