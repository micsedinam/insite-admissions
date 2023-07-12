@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">List of Reviewed Applicants</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $item)
                                <tr>
                                    <td>{{$item->firstname.' '.$item->othername.' '.$item->lastname}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary edit-status" value="{{$item->id}}"><a href="{{ url('admin/status/edit/'.$item->id) }}"><i class="fa fa-edit text-white" title="Edit" data-toggle="modal" data-target="#showStatus"></i></a></button>
                                            {{--<button class="btn btn-danger del-activity" value="{{$a->activity_id}}"><i class="fa fa-window-close" title="Delete"></i></button>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="showStatus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Application Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-update-status" action="{{ url('admin/status/update/'.$forms->form_id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="form_id_edit" name="form_id" value="">
                    <input type="hidden" id="status_id_edit" name="status_id" value="">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Application Status</label>
                                {{$item->form_id}}
                                <select id="status_name_edit" name="status" class="form-control" id="status">
                                    <option value="">Select Option</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-outline-primary mt-4 btn-update-status">Update Status</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

{{-- <script type="application/javascript">
    $(document).on('click', '.edit-status', function (e) {
        $('#showStatus').modal('show');
        var id = $(this).val();
        $.get("{{route('status.edit')}}", {id:id}, function (data) {
            console.log(data)
            $('#status_id_edit').val(data.id);
            $('#form_id_edit').val(data.form_id);
            $('#status_name_edit').val(data.status);
        });
    });
    $('.btn-update-status').on('click', function (e) {
        e.preventDefault();
        var data = $('#frm-update-status').serialize();
        var url = $(this).attr('action');
        $.post(url, data, function (data) {
            //showKSAInfo(data.name);
            $('#showStatus').modal('hide');
            swal('SUCCESS',
                'Status updated successfully',
                'success');
        }).fail(function (data,status,error) {
            console.log(data);
            var response = $.parseJSON(data.responseText)
            var possible_keys = Object.keys(response.errors);
            possible_keys.forEach((key)=>{
                $.each(response.errors[key], function(key, value){
                    swal({
                        title: "Ooops!",
                        text: value,
                        icon: "error",
                        color: "#FEFAE3",
                        button: "OK",
                    });
                });
            });
        });
    });
</script> --}}
@endsection
