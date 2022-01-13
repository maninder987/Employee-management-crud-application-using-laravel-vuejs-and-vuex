<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function create()
    {
        $data = [
            'scope' => 'create',
        ];
        return view('employee.form')->with($data);
    }

    public function storeEmployee(Request $request)
    {
        try
        {
            $employee = new Employee;
            $employee->name =  $request->name;
            $employee->department =  $request->department;
            $employee->section =  $request->section;
            $employee->email =  $request->email;
            $employee->save();

            return response()->json([
                'status' => 200,
                'message' => 'Employee saved successfully',
            ]);


        }
        catch(Exception $e)
        {
            dd($e);
        }
    }


    /**
     * Function gets data of employees.
     */
    public function index()
    {
        return view('employee.index');
    }

    /**
     * Getting all employees for list page.
     */
    public function getEmployeeData(Request $request)
    {
        try
        {
            $query  = Employee::select('id','name','department', 'section','email');

            if($request->searchQuery)
            {
                $query->where(function($q) use ($request) {
                    $q->orWhere('name', 'like', '%'.$request->searchQuery.'%');
                });
            };

            $employeeData = $query->get();

            return $employeeData;

        }catch(Exception $e)
        {
            dd($e);
        }


        // try
        // {
        //     return Employee::all();
        // }
        // catch(Exception $e)
        // {
        //     dd($e);
        // }
    }

    // Edit page

    public function edit($id)
    {
        $data = [
            'scope' => 'edit',
            'id' => $id,
        ];

        return view('employee.form')->with($data);
    }

    /**
     * Get single employee data by id.
     */
    public function getEmployeeDataById($id)
    {
        $employeeData = Employee::find($id);

        return response()->json([
            'status' => 200,
            'data'   => $employeeData
        ]);
    }


    /**
     *  For updating each employee.
     */

    public function update(Request $request, $id)
    {
        try
        {
            $employee = Employee::find($id);
            $employee->name =  $request->name;
            $employee->department =  $request->department;
            $employee->section =  $request->section;
            $employee->email =  $request->email;
            $employee->update();

            return response()->json([
                'status' => 200,
                'message' => 'Employee updated successfully',
            ]);
        }
        catch(Exception $e)
        {
            dd($e);
        }
    }


    /**
     * Function responsible for show page.
     */
    public function show($id)
    {
        $data = [
            'scope' => 'show',
            'id' => $id
        ];

        return view('employee.form')->with($data);
    }


    /**
     * Function responsible for deleting Employees.
     */
    public function destroy($id)
    {

        try
        {
            $employee = Employee::find($id);
            $employee->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Employee deleted successfully',
            ]);


        }catch(Exeption $e)
        {
            dd($e);
        }
       
    }
}
