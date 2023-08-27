@extends('admin.layout.master')

@section('content')
    <!-- Main content -->
    @include('admin.layout.masseges')
    <section class="content">
        <form method="post" action="{{route('admin.do_reset' , $id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Reset Password</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputName">Old Password</label>
                                <input value="{{old('old_password')}}" type="password" name="old_password"
                                       id="inputName"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName">New Password</label>
                                <input value="{{old('password')}}" type="password" name="password"
                                       id="inputName"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Confirm Password</label>
                                <input value="{{old('password_confirmation')}}" type="password"
                                       name="password_confirmation" id="inputName"
                                       class="form-control">
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Reset Password" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('title')
    Reset Password Page
@endsection
