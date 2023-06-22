<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\District;
use App\Models\Employee;
use App\Models\Thana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {


        // $employees = Employee::all();
        $employees = DB::select("
        SELECT *
        FROM employees
        INNER JOIN areas AS emp_areas ON employees.area_id = emp_areas.id
        INNER JOIN thanas ON emp_areas.thana_id = thanas.id
        INNER JOIN districts ON thanas.district_id = districts.id
    ");
    $districts = District::all();
    $thanas = Thana::all();
    $areas = Area::all();


 //dd( $employees);
        return view('employees.index', compact('districts','thanas','areas'))->with('employees', $employees);
    }
    public function edit(Request $request, $id)
    {

        $employee = Employee::find($id);

        return view('employees.edit',compact('employee'));
    }
    public function update(Request $request,$id)
    {

        $employees = Employee::find($request->id);
        $districts = District::find($request->dis_name);
        $thanas = Thana::find($request->thana_name);
        $areas = Area::find($request->area_name);
        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->age = $request->age;
        $employees->department = $request->department;
        $employees->designation = $request->designation;
        $employees->save();

        return response()->json(['success'=>true,'msg'=>'Employee updated successfully!']);
    }
    public function destroy($id)
{
    // Find the employee
    $employee = Employee::findOrFail($id);

    $employee->delete();
    return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
}
}
