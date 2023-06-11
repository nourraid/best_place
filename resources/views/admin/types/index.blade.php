@extends('admin.layout.master')


@section('content')

    @include('admin.layout.masseges')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Types</h3>

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

                <th style="width: 10%">
                   Type name
                </th>

                <th style="width: 20%">
                    Image Type
                </th>
                <th style="width: 30%">
                    Action
                </th>


            </tr>
        </thead>

        <tbody>
            @foreach($types as $type)

            <tr>

                <td>
                    {{$loop->iteration}}
                </td>

                <td>
                    <a>

                        {{$type->name}}
                    </a>
                    <br/>
                    <small>
                        Created {{$type->created_at}}
                    </small>
                </td>


                <td>
                      <img alt="Image" class="table-avatar" style=" border-radius: 2%; display: inline;width: 4rem;" src="{{asset('images/type/'.$type->imageName)}}">
                </td>

                <td class="project-actions text-right" >
                    <a  style="float: left ; margin: 10px" class="btn btn-info btn-sm" href="{{route('type.edit',$type)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form style="float: left ; margin: 10px" method="post" action="{{route('type.destroy',$type)}}">
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
{{$types->links()}}
</section>
@endsection

@section('title')
Types page
@endsection
