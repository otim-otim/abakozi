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
    public function getCompany($id) {
        try {
            $company = Company::find($id);
            return $company;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //create a company
    public function create(Request $request) {
        try {
            $company = Company::create([
                'name' => $request->name,
                'logo' => $request->logo,
                'website' => $request->website,
                'email' => $request->email,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //update a company details
    public function editCompany(Request $request,$id) {
        try {
            $company = $this->getCompany($id);
            $company-> name = $request->com_name;
            $company-> email = $request->email;
            $company-> logo = $request->logo;
            $company-> website = $request->website;
            $company->save();
            return $company;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //delete a company
    public function deleteCompany($id) {
        try {
            $company = $this->getCompany($id);
            $company->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
        }

    }
}
