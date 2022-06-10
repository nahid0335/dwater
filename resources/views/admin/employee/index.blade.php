@extends('layouts.app')

@section('title','Employees')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('employee.create') }}" class="btn btn-primary">Add New</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Employees</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Salary</th>
                                <th>Street Name</th>
                                <th>Street No</th>
                                <th>House No</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($employees as $key=>$employee)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>{{ $employee->street_name }}</td>
                                            <td>{{ $employee->street_no }}</td>
                                            <td>{{ $employee->house_no }}</td>
                                            <td>
                                                <a href="{{ route('employee.edit',$employee->employees_id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $employee->employees_id }}" action="{{ route('employee.destroy',$employee->employees_id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $employee->employees_id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush