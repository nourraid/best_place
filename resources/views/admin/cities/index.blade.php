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
                   City name
                </th>

                <th style="width: 30%">
                    Action
                </th>


            </tr>
        </thead>

        <tbody>
            @foreach($cities as $city)

            <tr>

                <td>
                    {{$loop->iteration}}
                </td>

                <td>
                    <a>

                        {{$city->name}}
                    </a>
                    <br/>
                    <small>
                        Created {{$city->created_at}}
                    </small>
                </td>



                <td class="project-actions text-right" >
                    <a  style="float: left ; margin: 10px" class="btn btn-info btn-sm" href="{{route('city.edit',$city)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form style="float: left ; margin: 10px" method="post" action="{{route('city.destroy',$city)}}">
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
{{$cities->links()}}
</section>
@endsection

@section('title')
Cities page
@endsection
