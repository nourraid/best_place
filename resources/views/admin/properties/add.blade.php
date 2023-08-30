@extends('admin.layout.master')

@section('content')
    <!-- Main content -->
    @include('admin.layout.masseges')
    <section class="content">
        <form method="post" action="{{route('property.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Property</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputName">Property Name</label>
                                <input value="{{old('name')}}" type="text" name="name" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Property description</label>
                                <textarea name="description" id="inputDescription" class="form-control"
                                          rows="4">{{old('description')}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="inputprice">Property Price</label>
                                <input value="{{old('price')}}" type="number" name="price" id="inputprice"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="imageName" value="{{old('imageName')}}">
                                    <label class="custom-file-label" for="customFile">Choose property image</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="Certificate" value="{{old('Certificate')}}">
                                    <label class="custom-file-label" for="Certificate">Choose Certificate image</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputaddress">Property Address</label>
                                <input value="{{old('address')}}" type="text" name="address" id="inputaddress" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="inputStatus">Cities</label>
                                <select name="city_id" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>
                                            {{$city->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Users</label>
                                <select name="user_id" id="inputStat us" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{old('user_id') == $user->id ? 'selected' : ''}}>
                                            {{$user->firstName ." " . $user->middleName . " " .$user->lastName}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="inputStatus">types</label>
                                <select name="type_id" id="inputStat us" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>
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
                    <input type="submit" value="Create New Property" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('title')
    Add Property page
@endsection
