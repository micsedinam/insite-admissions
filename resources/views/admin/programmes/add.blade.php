@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Programmes</h1>
@endsection

@section('content')
@include('admin.programmes.edit')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-warning text-white card-header">Add Programme</div>

            <div class="card-body">
                <form id="frm-create-prog" action="{{route('programme.store')}}" method="POST">
                    {{ csrf_field() }}
                    <p id="message"></p>
                    <p style="color:green" id="success"></p>
                    <div class="form-group">
                        <label for="dept_id">Select Department First</label>
                        <select class="form-control" name="dept_id" id="dept_id">
                            <option value="">Select Option</option>
                            @foreach ($dept as $item)
                                <option value="{{ $item->id }}">{{ $item->dept_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="">Programme Name</label>
                        <input class="form-control" id="prog_name" name="prog_name">
                    </div>
                    
                    <button type="submit" class="btn btn-outline-secondary btn-block">Add Programme</button>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<div id="add-prog">

</div>

<script type="application/javascript">
    showProgrammes();

    $('#frm-create-prog').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url, data,function (data) {
            showProgrammes(data.id);
            console.log(data);
            swal('SUCCESS',
                'Programme saved successfully',
                'success');
            $('#frm-create-prog').trigger('reset');
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

    function showProgrammes()
    {
        var data = $('#frm-create-prog').serialize();
        console.log(data);
        $.get("{{route('programme.list')}}", data, function (data) {
            $('#add-prog').empty().append(data);
        });
    }

    $(document).on('click', '.edit-prog', function (e) {
        $('#show-prog').modal('show');
        var id = $(this).val();
        $.get("{{route('programme.edit')}}", {id:id}, function (data) {
            console.log(data)
            $('#prog_id_edit').val(data.id);
            $('#dept_id_edit').val(data.dept_id);
            $('#prog_name_edit').val(data.prog_name);
        });
    });
    $('.btn-update-prog').on('click', function (e) {
        e.preventDefault();
        var data = $('#frm-update-prog').serialize();
        $.post("{{route('programme.update')}}", data, function (data) {
            showProgrammes(data.prog_name);
            $('#show-prog').modal('hide');
            swal('SUCCESS',
                'Programme updated successfully',
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

    $(document).ready(function() {
        $('#prog_table').DataTable( {
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
