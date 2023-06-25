@extends('employees.layout')
@section('content')
<div class="container">
    <div style="height:50px;"></div>
    <div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:100%;">
        <span style="font-size:25px; color:blue"><strong>Employee CRUD</strong></span>
        <span class="pull-right">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew">
        <i class="bi bi-clipboard2-plus-fill"></i> Add New
        </button>
        </span>
        <div style="height:15px;"></div>
        @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>ID</th>
                <th>District</th>
                <th>Thana</th>
                <th>Area</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->dis_name}}</td>
                        <td>{{$employee->thana_name}}</td>
                        <td>{{$employee->area_name}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->age}}</td>
                        <td>{{$employee->department}}</td>
                        <td>{{$employee->designation}}</td>
                        <td>
                            <a href="{{ url('edit/'.$employee->id) }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i> Edit</a>
                           <a href="{{ route('destroy', $employee->id) }}"><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i> Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                    <div class="modal-body">
                    <div class="container-fluid">
                    <form action="{{ url('employees/'.$employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-2">
                                <label style="position:relative; top:7px;">ID:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="id" class="form-control" value="{{ $employee->id }}">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label style="position:relative; top:7px;">District:</label>
                            </div>
                            <div class="col-md-10">

                                <select>
                                    <option value="">---Select District---</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->dis_name }}">{{ $district->dis_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-md-2">
                            <label style="position:relative; top:7px;">Thana:</label>
                        </div>
                        <div class="col-md-10">

                            <select>
                                <option value="">---Select Thana---</option>
                                @foreach ($thanas as $thana)
                                    <option value="{{ $thana->thana_name }}">{{  $thana->thana_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-md-2">
                            <label style="position:relative; top:7px;">Area:</label>
                        </div>
                        <div class="col-md-10">

                            <select>
                                <option value="">---Select Area---</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->area_name }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                            <div class="col-md-2">
                                <label style="position:relative; top:7px;">Name:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label style="position:relative; top:7px;">Email:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="email" class="form-control" value="{{ $employee->email }}">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label style="position:relative; top:7px;">Age:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="age" class="form-control" value="{{ $employee->age }}">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label style="position:relative; top:7px;">Department:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="department" class="form-control" value="{{ $employee->department }}">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label style="position:relative; top:7px;">Designation:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="designation" class="form-control" value="{{ $employee->designation }}">
                            </div>
                        </div>

                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- add employees --}}
        <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="addnew.php">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" style="position:relative; top:7px;">District:</label>
                                </div>
                                <div class="col-md-10">
                                    <select type="integer" class="form-control" name="dis_name">
                                        <option value="">Select District</option>

                                    </select>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" style="position:relative; top:7px;">Thana:</label>
                                </div>
                                <div class="col-md-10">
                                    <select type="integer" class="form-control" name="thana">
                                        <option value="">Select Thana</option>

                                    </select>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" style="position:relative; top:7px;">Area:</label>
                                </div>
                                <div class="col-md-10">
                                    <select type="integer" class="form-control" name="area_id">
                                        <option value="">Select Area</option>

                                    </select>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" style="position:relative; top:7px;">Name:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" style="position:relative; top:7px;">Email:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" style="position:relative; top:7px;">Age:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="integer" class="form-control" name="age">
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" style="position:relative; top:7px;">Department:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="department">
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" style="position:relative; top:7px;">Designation:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="designation">
                                </div>
                            </div>
                            <div style="height:10px;"></div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end add employees --}}
        @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
    </div>
</div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">

@endsection
@push('script')

@endpush
