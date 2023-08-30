@extends('admin.layout.master')

@section('content')

    @include('admin.layout.masseges')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">

                    <thead>
                    <tr>

                        <th style="width: 1%">
                            #
                        </th>

                        <th>
                            Property Name
                        </th>

                        <th>
                            Property Address
                        </th>
                        <th>
                            Property Description
                        </th>

                        <th>
                            Property Price
                        </th>

                        <th>
                            Property  Image
                        </th>


                        <th>
                            Certificate Image
                        </th>


                        <th>
                            Property  state
                        </th>

                        <th>
                            Property city
                        </th>
                        <th>
                            Property type
                        </th>
                        <th>
                            Property user
                        </th>

                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($properties as $property)

                        <tr>

                            <td>
                                {{$loop->iteration}}
                            </td>

                            <td>
                                <a>

                                    {{$property->name}}
                                </a>
                                <br/>
                                <small>
                                    Created {{$property->created_at}}
                                </small>
                            </td>

                            <td>
                                {{$property->address}}
                            </td>

                            <td>
                                {{$property->description}}
                            </td>

                            <td>
                                {{$property->price}}
                            </td>

                            <td>
                                <img alt="Image" class="table-avatar"
                                     style=" border-radius: 2%; display: inline;width: 4rem;"
                                     src="{{asset('images/property/'.$property->image)}}">
                            </td>

                            <td>
                                <img alt="Image" class="table-avatar"
                                     style=" border-radius: 2%; display: inline;width: 4rem;"
                                     src="{{asset('images/Certificate_of_ownership/'.$property->Certificate_of_ownership)}}">
                            </td>
                            <td>
                                {{$property->state}}
                            </td>

                            <td>
                                {{\App\Models\City::find($property->city_id)->name}}
                            </td>


                            <td>
                                {{\App\Models\Type::find($property->type_id)->name}}
                            </td>


                            <td>
                                @php
                                    $user = \App\Models\User::find($property->user_id)
                                @endphp
                                {{$user->firstName ." " . $user->middleName . " " .$user->lastName}}
                            </td>


                            <td class="project-actions text-right" >
                                <a  style="float: left ; margin: 10px" class="btn btn-info btn-sm" href="{{route('property.edit',$property)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form style="float: left ; margin: 10px" method="post" action="{{route('property.destroy',$property)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>


                                </form>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{$properties->links()}}
    </section>
@endsection

@section('title')
    property page
@endsection
