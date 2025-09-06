<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\VisaApplication;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function index()
    {
        $apps = VisaApplication::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('applicant.index', compact('apps'));
    }

    public function create()
    {
        return view('applicant.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'visa_type' => 'required|string|max:100',
            'purpose'   => 'nullable|string|max:255',
            'arrival_date' => 'nullable|date',
            'duration_days' => 'nullable|integer|min:1|max:365',
            'passport_scan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'photo' => 'nullable|image|max:2048',
        ]);

        $app = VisaApplication::create([
            'user_id' => Auth::id(),
            'visa_type' => $validated['visa_type'],
            'purpose' => $validated['purpose'] ?? null,
            'arrival_date' => $validated['arrival_date'] ?? null,
            'duration_days' => $validated['duration_days'] ?? null,
            'status' => 'submitted',
            'reference_no' => strtoupper(Str::random(10)),
            'fee_amount' => 0,
            'payment_status' => 'unpaid',
        ]);

        // Save documents if present
        if ($request->hasFile('passport_scan')) {
            $path = $request->file('passport_scan')->store('documents');
            Document::create([
                'visa_application_id' => $app->id,
                'type' => 'passport',
                'file_path' => $path
            ]);
        }
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('documents');
            Document::create([
                'visa_application_id' => $app->id,
                'type' => 'photo',
                'file_path' => $path
            ]);
        }

        return redirect()->route('applications.show', $app->id)
            ->with('success', 'Application submitted successfully.');
    }

    public function show($id)
    {
        $app = VisaApplication::where('user_id', Auth::id())->findOrFail($id);
        return view('applicant.show', compact('app'));
    }
}
