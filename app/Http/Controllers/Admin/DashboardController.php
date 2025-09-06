<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisaApplication;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => VisaApplication::count(),
            'submitted' => VisaApplication::where('status','submitted')->count(),
            'approved' => VisaApplication::where('status','approved')->count(),
            'rejected' => VisaApplication::where('status','rejected')->count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}
