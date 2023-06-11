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
                            User Name
                        </th>

                        <th>
                            User Address
                        </th>
                        <th>
                            User Mobile Number
                        </th>

                        <th>
                            User Email
                        </th>

                        <th>
                            User Image
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)

                        <tr>

                            <td>
                                {{$loop->iteration}}
                            </td>

                            <td>
                                <a>

                                    {{$user->firstName ." " . $user->middleName . " " .$user->lastName}}
                                </a>
                                <br/>
                                <small>
                                    Created {{$user->created_at}}
                                </small>
                            </td>

                            <td>
                                {{
                 \App\Models\City::find($user->city_id)->name}}
                            </td>

                            <td>
                                {{$user->mobile_number}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                <img alt="Image" class="table-avatar"
                                     style=" border-radius: 2%; display: inline;width: 4rem;"
                                     src="{{asset('images/user/'.$user->userImage)}}">
                            </td>

                            <td class="project-actions text-right">
                                <form style="float: left ; margin: 10px" method="post"
                                      action="{{route('user.destroy',$user)}}">
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
        {{$users->links()}}
    </section>
@endsection

@section('title')
    users page
@endsection
