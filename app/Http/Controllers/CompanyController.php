<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
{
    return view('admin.companies.create');
}

    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // Define validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|string|max:255',
            'status' => 'required|in:active,closed',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle logo file
        if ($request->hasFile('logo')) {
            // If there is an existing logo, delete it
            if ($company->logo) {
                $existingLogoPath = public_path('storage/logos/' . $company->logo);
                if (file_exists($existingLogoPath)) {
                    unlink($existingLogoPath);
                }
            }

            // Store the new logo file
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/logos', $filename); // Store the file in the public/logos directory

            // Add the new logo filename to the validated data
            $validatedData['logo'] = $filename;
        }

        // Update the company with validated data
        $company->update($validatedData);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

    
    
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    public function updateStatus(Request $request, Company $company)
    {
        $company->status = $request->input('status');
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company status updated successfully!');
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'website' => 'nullable|string|max:255',
        'status' => 'required|in:active,closed',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
     // Check if a new logo is uploaded
     if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/logos', $filename); // Store the file in the public/logos directory

        // Add the logo filename to the validated data
        $validatedData['logo'] = $filename;
    }
    $validatedData['loged_in_id'] = auth()->id();
    Company::create($validatedData);

    return redirect()->route('companies.index')->with('success', 'Company created successfully!');
}
}
