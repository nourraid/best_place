@extends('admin.layout.master')

@section('content')

 <!-- Main content -->
 @include('admin.layout.masseges')

 <section class="content">
     <form method="post" action="{{route('city.update',$city)}}"  enctype="multipart/form-data">
         @csrf
         @method('PUT')
      <div class="row">
        <div class="col-md">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit City</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">City name</label>
                <input type="text" name="name" id="inputName" class="form-control" value="{{$city->name}}">
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
          <input type="submit" value="Edit City" class="btn btn-success float-right">
        </div>
      </div>
     </form>
    </section>
    <!-- /.content -->
@endsection

@section('title')
Edit City page
@endsection
