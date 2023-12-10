<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('company.index', [
            'companies' => Company::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        // Upload image
        if ($request->hasFile('logo_img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('logo_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Replace space by underscore
            $filename = str_replace(' ', '_', $filename);
            // Get just ext
            $extension = $request->file('logo_img')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename . '_' . time() . '.' . $extension;
            // Upload logo_img 
            $path = $request->file('logo_img')->storeAs('public/logos', $filenameToStoreImg);
        } else {
            $filenameToStoreImg = 'placeholder.jpg';
        }

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $filenameToStoreImg
        ]);

        return redirect(route('companies.index'))->with('success', 'Comapany added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.create', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->only(['name', 'email', 'logo_img']);

        if ($request->hasFile('logo_img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('logo_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Replace space by underscore
            $filename = str_replace(' ', '_', $filename);
            // Get just ext
            $extension = $request->file('logo_img')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename . '_' . time() . '.' . $extension;
            // Upload logo_img 
            $path = $request->file('logo_img')->storeAs('public/logos', $filenameToStoreImg);
            // Delete the old image
            $company->deleteLogo();
            // assign new image
            $data['logo'] = $filenameToStoreImg;
        }

        // update the company
        $company->update($data);

        return redirect(route('companies.index'))->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        $company->deleteLogo();

        return back()->with('success', 'Company deleted successfully.');
    }
}
