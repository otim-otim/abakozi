<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CompanyController extends Controller
{
    //retrieve all companies
    public function index(Request $request) {
        try {
            if($request->is('api/*')){
                $companies = Company::all();
                return $companies;
            }
            $companies = Company::paginate(10);
            return view('company.index',['companies'=>$companies])->with('title','companies');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
            // return  $th->getMessage();
        }

    }

    //retieve a single company
    public function show(Request $request,$id) {
        try {
            $company = Company::find($id);
            $employees = $company->employees;
            if ($request->is('api/*')) {
            return ['company'=>$company,'employees'=>$employees];
            }
            return view('company.show',['company'=>$company,'employees'=>$employees])
                ->with('title','Company Details');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
            // return  $th->getMessage();
        }
    }

    //create a view for creating a company
    public function create(){
        return view('company.create')->with('title','Create Company');
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
                if($request->is('api/*')){
                    return $company;
                }
                return view('company.show',['company'=>$company])->with('title','Company details');
            }

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //return edit view
    public function edit($id) {
        try {
            $company = Company::findOrFail($id);
            if($company) {
                return view('company.edit',['company'=>$company])
                    ->with('title','Edit Company');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
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
                $company = Company::find($id);
                if ($company) {
                    $company->name = $request->com_name;
                    $company->email = $request->email;
                    $company->logo = $request->logo;
                    $company->website = $request->website;
                    $company->save();
                    if($request->is('api/*')){
                        return $company;
                    }
                    return view('company.show',['company'=>$company])
                        ->with('title',$company->name.' details');
                }
                return 'company not found';
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
            // return  $th->getMessage();
        }
    }

    //delete a company
    public function destroy(Request $request,$id) {
        try {
            $company = Company::findOrFail($id);
            $company->delete();
            if($request->is('api/*')){
                return 'successfully deleted company';
            }
            return redirect()->back()->with('message','company deleted successfully');
        } catch (\Throwable $th) {
            // return redirect()->back()->with('error_message', $th->getMessage());
            return redirect()->back()->with('error_message', $th->getMessage());
        }

    }
}
