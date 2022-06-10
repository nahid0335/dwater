@extends('layouts.cusapp')

@section('title','History')

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
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">History</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Time and Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                </thead>
                                <tbody>
                                @foreach($reservations as $key=>$reservation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $reservation->date_and_time }}</td>
                                        <td>{{ $reservation->amount }}</td>
                                        <td>
                                            @if($reservation->status == true)
                                                <span class="label label-info">Confirmed</span>
                                            @else
                                                <span class="label label-danger">not Confirmed yet</span>
                                            @endif

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