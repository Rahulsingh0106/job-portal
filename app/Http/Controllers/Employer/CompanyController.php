<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\AuthBaseController;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{

    public function index()
    {
        return Inertia::render('employer/Company');
    }

    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'companyName' => 'required|string|max:255',
            'companyEmail' => 'required|string|email|max:255',
            'companyPhone' => 'nullable|numeric|digits_between:10',
            'companyAddress' => 'required|string|max:255',
            'about' => 'nullable|string|max:255',
        ]);

        try {
            Company::updateOrCreate(
                ['employer_id' => $request->user()->id], // Match condition
                [
                    'company_name' => $request->companyName,
                    'company_email' => $request->companyEmail,
                    'company_contact' => $request->companyPhone,
                    'company_address' => $request->companyAddress,
                    'about' => $request->about,
                ]
            );
            return to_route('employer.dashboard');
        } catch (\Throwable $th) {
            return to_route('employer.company');
        }
        return to_route('employer.dashboard');
    }
}
