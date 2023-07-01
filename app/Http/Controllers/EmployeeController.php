<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\District;
use App\Models\Employee;
use App\Models\Thana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index()
    {

    $employees = DB::table('employees')
    ->join('areas', 'employees.area_id', '=', 'areas.id')
    ->join('thanas', 'areas.thana_id', '=', 'thanas.id')
    ->join('districts', 'thanas.district_id', '=', 'districts.id')
    ->select('employees.*','districts.dis_name','thanas.thana_name','areas.area_name')
    ->get();

    $districts = District::all();
    $thanas = Thana::all();
    $areas = Area::all();


 //dd( $employees);
        return view('employees.index', compact('districts','thanas','areas'))->with('employees', $employees);
    }
    public function edit($id)
    {
        $employees = Employee::find($id);

        return view('employees.index',compact('employees'));
    }
    public function update(Request $request,$id)
    {

        $employee = Employee::findOrFail($id);
        // $district = District::where('dis_name', $request->dis_name)->first();
        // $thana = Thana::where('thana_name', $request->thana_name)->first();
        // $area = Area::where('area_name', $request->area_name)->first();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->department = $request->department;
        $employee->area_id = $request->area_id;
        $employee->designation = $request->designation;
        $employee->save();

        return redirect()->back()->with(['status','Employee updated successfully!']);
    }
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
