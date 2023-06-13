@extends('admin.layout.master')

@section('content')

    @include('admin.layout.masseges')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ratings</h3>

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
                            Property Name
                        </th>
                        <th>
                            Property State
                        </th>
                        <th>
                            Reservation Code
                        </th>
                        <th>
                            Created at
                        </th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($reservations as $reservation)

                        <tr>

                            <td>
                                {{$loop->iteration}}
                            </td>

                            <td>
                                @php
                                    $user = \App\Models\User::find($reservation->user_id)
                                @endphp
                                {{$user->firstName ." " . $user->middleName . " " .$user->lastName}}
                            </td>

                            <td>
                                {{\App\Models\Property::find($reservation->property_id)->name}}
                            </td>

                            <td class="project-state">
                                <span class="badge badge-success">{{$reservation->state}}</span>
                            </td>

                            <td>
                                {{$reservation->reservation_code}}
                            </td>

                            <td>
                                {{$reservation->created_at}}
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{$reservations->links()}}
    </section>
@endsection

@section('title')
    Reservations Page
@endsection
