<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //retrieve all employees
    public function index() {
        try {
            $employees = Employee::all();
            return $employees;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function create(Request $request,$id) {
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
        }
    }

    //retrirve company employees
    public function comEmployees($com) {
        try {
            $company = Company::find($com);
            if($company) {
                $employees = $company->employees;
                return $employees;
            }
            return 'company not found';
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //get a particular employee
    public function getEmployee($id) {
        try {
            $employee = Employee::find($id);
            if($employee){
                return $employee;
            }
            return response('employee details not found');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //edit employees details
    public function edit(Request $request,$id) {
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
        }
    }

    //delete an employee
    public function remove($id) {
        try {
            $employee = $this->getEmployee($id);
            $employee->delete();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
