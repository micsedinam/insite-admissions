@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">All Users</h1>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title" align="center">All Users</h5>
            <div class="table-responsive">
                <table id="all_users_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Index Number</th>
                        <th>Department</th>
                        <th>User Type</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allUsers as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->index_number}}</td>
                            <td>{{$item->dept_name}}</td>
                            <td>
                                @if ($item->is_admin == 1)
                                    System Admin
                                @elseif ($item->is_admin == 3)
                                    School Administrator
                                @elseif ($item->is_admin == 0)
                                    New Applicant
                                @else
                                    Continuing Student
                                @endif
                            </td>
                            <td></td>
                            {{-- <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary edit-dept" value="{{$item->id}}"><i class="fa fa-edit" title="Edit"></i></button>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#all_users_table').DataTable( {
                responsive: true,
                dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print'
                ]
            } );
        } );
    </script>
@endsection
