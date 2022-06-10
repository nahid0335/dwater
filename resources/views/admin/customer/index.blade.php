@extends('layouts.app')

@section('title','Customers')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   <!-- <a href="{{ route('customer.create') }}" class="btn btn-primary">Add New</a> -->
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Customers</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Street Name</th>
                                <th>Street No</th>
                                <th>House No</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($customers as $key=>$customer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->street_name }}</td>
                                            <td>{{ $customer->street_no }}</td>
                                            <td>{{ $customer->house_no }}</td>

                                            <td>
                                               {{-- <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a> --}}

                                                <form id="delete-form-{{ $customer->customers_id }}" action="{{ route('customer.destroy',$customer->customers_id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $customer->customers_id }}').submit();
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