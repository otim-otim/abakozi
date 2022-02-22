<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //retrieve all employees
    public function index(Request $request) {
        try {
            if($request->is('api/*')){
                $employees = Employee::all();
                return $employees;
            }
            $employees = Employee::paginate(10);
            return view('employee.index',['employees'=> $employees])
                ->with('title','All employees');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }
    //return view for employee creation
    public function create($id){
        try {
            $company = Company::findOrFail($id);
            return view('employee.create',['company'=>$company])
                ->with('title','Create Employee');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message',$th->getMessage());
        }

    }

    public function store(Request $request,$id) {
        try {
            $validated = $request->validate([
                'fname' => 'required|string|between:2,100',
                'lname' => 'required|string|between:2,100',
                'email' => 'required|string|email|max:255',
                'phone' => 'nullable|string',

            ]);
            if ($validated) {
            $company = Company::find($id);
            if($company) {
                $company->employees()->create([
                    'FirstName' => $request->fname,
                    'LastName' => $request->lname,
                    'email' => $request->email,
                    'phone' => $request->phone

                ]);


            }
            return 'company doesnt exist ';
        }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //retrirve company employees
    public function indexComEmployees($com) {
        try {
            $company = Company::find($com);
            if($company) {
                $employees = $company->employees;
                return $employees;
            }
            return 'company not found';
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //get a particular employee
    public function show($id) {
        try {
            $employee = Employee::find($id);
            if($employee){
                return $employee;
            }
            return response('employee details not found');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //edit view
    public function edit($id) {
        try {
            $employee = Employee::findOrFail($id);
            return view('employee.edit', ['employee' => $employee])
            ->with('title', 'Edit Employee');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message',$th->getMessage());
        }
    }
    //update employees details
    public function update(Request $request,$id) {
        try {
            $validated = $request->validate([
                'fname' => 'required|string|between:2,100',
                'lname' => 'required|string|between:2,100',
                'email' => 'required|string|email|max:255',
                'phone' => 'nullable|string',

            ]);
            if ($validated) {
                $employee = $this->getEmployee($id);
                $employee->FirstName = $request->fname;
                $employee->LastName = $request->lname;
                $employee->email = $request->email;
                $employee->phone = $request->phone;
                $employee->company = $request->company;
                $employee->save();
                return $employee;
            }
        }catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }

    //delete an employee
    public function destroy($id) {
        try {
            $employee = $this->getEmployee($id);
            $employee->delete();
            return 'employee successfully deleted';
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', $th->getMessage());
        }
    }
}
