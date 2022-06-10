@extends('layouts.cusapp')

@section('title','Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title">Profile Dashboard</h4>
                        </div>
                        <br/>
                        <div style="margin: 40px 20px 100px 30px">
                            <form>
                                <fieldset>
                                    <legend>Information</legend>
                                    <label for="user-name"><b>Username:</b></label>
                                    <label>{{$customer->name}}</label><br/>
                                    <label for="user-pwd"><b>E-mail:</b></label>
                                    <label>{{$customer->email}}</label><br/>
                                    <label for="user-pwd"><b>Password:</b></label>
                                    <label>{{$customer->cus_password}}</label><br/>
                                    <label for="user-pwd"><b>Mobile:</b></label>
                                    <label>{{$customer->phone}}</label><br/>
                                    <label for="user-pwd"><b>Street Name:</b></label>
                                    <label>{{$customer->street_name}}</label><br/>
                                    <label for="user-pwd"><b>Street No:</b></label>
                                    <label>{{$customer->street_no}}</label><br/>
                                    <label for="user-pwd"><b>House No:</b></label>
                                    <label>{{$customer->house_no}}</label><br/>
                                </fieldset>
                            </form>
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