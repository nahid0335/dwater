@extends('layouts.app')

@section('title','Signin')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Sign In</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{ route('signin.send') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Sign In</button>
                                <a href="{{ route('welcome') }}" class="btn btn-danger">Back</a>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"><b>     Don't have account !!   </b></label>
                                            <a href="{{ route('signup.get') }}" class="btn btn-info">Sign Up</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush