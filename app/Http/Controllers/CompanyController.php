<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CompanyController extends Controller
{
    //retrieve all companies
    public function index() {
        try {
            $companies = Company::all();
            return $companies;
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
        }

    }

    //retieve a single company
    public function show($id) {
        try {
            $company = Company::find($id);
            return $company;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //create a company
    public function store(Request $request) {
        try {
            $validated = $request->validate([
                'name' => 'required|string|between:2,100',
                'email' => 'required|string|email|max:255',
                'logo' => 'nullable|string',
                'website' => 'nullable|string',
            ]);
            if($validated){
                $company = Company::create([
                    'name' => $request->name,
                    'logo' => $request->logo,
                    'website' => $request->website,
                    'email' => $request->email
                ]);
                return $company;
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //update a company details
    public function update(Request $request,$id) {
        try {
            $validated = $request->validate([
                'name' => 'required|string|between:2,100',
                'email' => 'required|string|email|max:255',
                'logo' => 'nullable|string',
                'website' => 'nullable|string',
            ]);
            if ($validated) {
                $company = $this->getCompany($id);
                if ($company) {
                    $company->name = $request->com_name;
                    $company->email = $request->email;
                    $company->logo = $request->logo;
                    $company->website = $request->website;
                    $company->save();
                    return $company;
                }
                return 'company not found';
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //delete a company
    public function destroy($id) {
        try {
            $company = $this->getCompany($id);
            $company->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
        }

    }
}
