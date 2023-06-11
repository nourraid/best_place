@extends('admin.layout.master')

@section('content')
    <!-- Main content -->
    @include('admin.layout.masseges')
    <section class="content">
        <form method="post" action="{{route('type.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Type</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Type Name</label>
                                <input value="{{old('name')}}" type="text" name="name" id="inputName"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="imageName">
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                </div>
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
                    <input type="submit" value="Create New Type" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('title')
    Add type page
@endsection
