@extends('admin.layout.master')

@section('content')

 <!-- Main content -->
 @include('admin.layout.masseges')

 <section class="content">
     <form method="post" action="{{route('type.update',$type)}}"  enctype="multipart/form-data">
         @csrf
         @method('PUT')
      <div class="row">
        <div class="col-md">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Type</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Type name</label>
                <input type="text" name="name" id="inputName" class="form-control" value="{{$type->name}}">
              </div>

                <div class="form-group">
                    <label for="inputName">Current Image</label>
                    <br>
                    <img alt="Image" class="table-avatar" style=" border-radius: 2%; display: inline;width: 4rem;" src="{{asset('images/type/'.$type->imageName)}}">
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image_name">
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
          <input type="submit" value="Edit Type" class="btn btn-success float-right">
        </div>
      </div>
     </form>
    </section>
    <!-- /.content -->
@endsection

@section('title')
Edit type page
@endsection
