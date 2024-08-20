@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Get User Information</h1>
@endsection

@section('content')
{{-- @include('admin.fees.edit') --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Get User Information</div>

            <div class="card-body">
                <form id="frm-get-user" action="{{route('code.store')}}" method="POST">
                    {{ csrf_field() }}
                    <p id="message"></p>
                    <p style="color:green" id="success"></p>
                
                    <div class="mb-4">
                        <label class="label-control">Index Number</label>
                        <input class="form-control" id="index_number" name="index_number" required>
                    </div>
                    
                    <p class="name_error_text"></p>
                    </label><br>
                    <button type="submit" class="btn btn-outline-secondary btn-block">Get User</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>


<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title" align="center">All Users</h5>
        <div class="table-responsive">
            <table id="all_users_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($getUser as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
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
