@extends('admin.layout.master')

@section('content')

    @include('admin.layout.masseges')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Authors</h3>

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
                            Admin Name
                        </th>

                        <th>
                            Admin Email
                        </th>

                        <th>
                            Action
                        </th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($admins as $admin)

                        <tr>

                            <td>
                                {{$loop->iteration}}
                            </td>

                            <td>
                                <a>

                                    {{$admin->name}}
                                </a>
                                <br/>
                                <small>
                                    Created {{$admin->created_at}}
                                </small>
                            </td>

                            <td>
                                {{$admin->email}}
                            </td>

                            <td class="project-actions text-right">
                                <a style="float: left ; margin: 10px" class="btn btn-primary btn-sm"
                                   href="{{route('admin.reset',$admin)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    reset password
                                </a>
                                <a style="float: left ; margin: 10px" class="btn btn-info btn-sm"
                                   href="{{route('admin.edit',$admin)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form style="float: left ; margin: 10px" method="post"
                                      action="{{route('admin.destroy',$admin)}}">
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
        {{$admins->links()}}
    </section>
@endsection

@section('title')
    admins page
@endsection
