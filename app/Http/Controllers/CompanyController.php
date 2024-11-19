<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
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
            'tinnumber' => 'required',
            'status' => 'required|in:active,closed',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'notes'=> 'required',
            'acowner'=> 'required',
            'bkaccount'=> 'required',
            'bkname'=> 'required',
        ]);
    
        try {
            // Handle logo file
            if ($request->hasFile('logo')) {
                // Ensure public/logos directory exists, and create if not
                $logosPath = public_path('logos');
                if (!File::exists($logosPath)) {
                    File::makeDirectory($logosPath, 0755, true); // Create with permissions if not exists
                }
    
                // If there is an existing logo, delete it
                if ($company->logo && File::exists(public_path('logos/' . $company->logo))) {
                    File::delete(public_path('logos/' . $company->logo));
                }
    
                // Store the new logo file directly in the 'public/logos' directory
                $file = $request->file('logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('logos'), $filename); // Directly move to public/logos
    
                // Add the new logo filename to the validated data
                $validatedData['logo'] = $filename;
            }
    
            // Update the company with validated data
            $company->update($validatedData);
    
            return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error updating company: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while updating the company. Please try again.');
        }
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
        'tinnumber'=> 'required',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'notes'=> 'required',
        'acowner'=> 'required',
        'bkaccount'=> 'required',
        'bkname'=> 'required',
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
