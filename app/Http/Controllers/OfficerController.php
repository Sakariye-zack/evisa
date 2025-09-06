<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisaApplication;

class OfficerController extends Controller
{
    public function index()
    {
        $apps = VisaApplication::orderBy('status')->orderByDesc('created_at')->paginate(15);
        return view('officer.index', compact('apps'));
    }

    public function review($id, Request $request)
    {
        $request->validate([
            'decision' => 'required|in:approve,reject,request_info',
            'reason' => 'nullable|string|max:500'
        ]);

        $app = VisaApplication::findOrFail($id);
        if ($request->decision === 'approve') {
            $app->status = 'approved';
        } elseif ($request->decision === 'reject') {
            $app->status = 'rejected';
        } else {
            $app->status = 'under_review'; // placeholder for request info flow
        }
        $app->save();

        return back()->with('success', 'Decision saved.');
    }
}
