@extends('admin.layout.master')

@section('content')
 <!-- Main content -->
 @include('admin.layout.masseges')
 <section class="content">
     <form method="post" action="{{route('property.update',$property)}}"  enctype="multipart/form-data">
         @csrf
         @method('PUT')
      <div class="row">
        <div class="col-md">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Property</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Property Name</label>
                <input type="text" name="name" id="inputName" class="form-control" value="{{$property->name}}">
              </div>

                <div class="form-group">
                    <label for="inputDescription">Book description</label>
                    <textarea name="description" id="inputDescription" class="form-control"
                              rows="4">{{$property->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="inputprice">Property Price</label>
                    <input value="{{$property->price}}" type="number" name="price" id="inputprice"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="inputName">Current Image</label>
                    <br>
                    <img alt="Image" class="table-avatar" style=" border-radius: 2%; display: inline;width: 4rem;" src="{{asset('images/property/'.$property->image)}}">
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image_name">
                        <label class="custom-file-label" for="customFile">Choose image</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputaddress">Property Address</label>
                    <textarea name="address" id="inputaddress" class="form-control"
                              rows="4">{{$property->address}}</textarea>
                </div>



              <div class="form-group">
                <label for="inputStatus">Cities</label>
                <select name="city_id" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                    @foreach($cities as $city)
                  <option value="{{$city->id}}" {{$property->city_id == $city->id ? 'selected' : ''}}>
                  {{$city->name}}
                  </option>
                    @endforeach
                </select>
              </div>


                <div class="form-group">
                    <label for="inputStatus">state</label>
                    <select name="state" id="inputStatus" class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        @php
                        $states = ['waiting' , 'accept' , 'reject'];
                        @endphp

                        @foreach($states as $state)
                            <option value="{{$state}}" {{$property->state == $state ? 'selected' : ''}}>
                                {{$state}}
                            </option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group">
                    <label for="inputStatus">Users</label>
                    <select name="user_id" id="inputStatus" class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}" {{$property->user_id == $user->id ? 'selected' : ''}}>
                                {{$user->firstName ." " . $user->middleName . " " .$user->lastName}}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="inputStatus">Types</label>
                    <select name="type_id" id="inputStatus" class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{$property->type_id == $type->id ? 'selected' : ''}}>
                                {{$type->name}}
                            </option>
                        @endforeach
                    </select>
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
          <input type="submit" value="Edit Property" class="btn btn-success float-right">
        </div>
      </div>
     </form>
    </section>
    <!-- /.content -->
@endsection

@section('title')
Edit Property page
@endsection
