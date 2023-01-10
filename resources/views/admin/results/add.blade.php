@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Results</h1>
@endsection

@section('content')
{{-- @include('admin.department.edit') --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Add Semester Results</div>

            <div class="card-body">
                <form id="frm-create-district" class="form-horizontal" action="" method="post">
                    <div class="card-body">
                        <h4 class="card-title" align="center">Add District</h4>
                        <div class="form-group row">
                            <label for="region" class="col-sm-3 text-left control-label col-form-label">Region</label>
                            <div class="col-sm-9">
                                <select name="region_id" id="region_id_append" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                    <option value="">Select Region</option>
                                    @foreach($region as $key =>$r)
                                        <option value="{{$r->region_id}}"}}>{{strtoupper($r->name." "."region")}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="division" class="col-sm-3 text-left control-label col-form-label">Division</label>
                            <div class="col-sm-9">
                                <select name="division_id" id="division_id_append" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                    <option value="">Select Division</option>
                                    {{--  @foreach($division as $key =>$div)
                                        <option value="{{$div->division_id}}"}}>{{$div->name}}</option>
                                    @endforeach  --}}
                                </select>
                            </div>
                        </div>
                        <div class="loader"></div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-left control-label col-form-label">District</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="district_add" class="form-control" placeholder="Add District">
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <label for="name" class="col-sm-3 text-left control-label col-form-label"></label>
                        <button type="submit" class="btn btn-primary" id="add-district-clear"><i class="fas fa-plus-circle"></i> Add District</button>
                        <button type="submit" class="btn btn-primary" id="add-district-copy"><i class="fas fa-plus-circle"></i> Add District & Copy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div id="add-results">

</div>

<script type="application/javascript">
    showDistrictInfo();

    $("#frm-create-district #region_id_append").on('change',function(e){
        var region_id = $(this).val();
        var division = $('#division_id_append')
        $(division).empty();
        $(division).append("<option>Select Value</option>");
        $('.loader').show()
        $.get("{{route('showDDivisions')}}",{region_id:region_id}, function(data){
            $('.loader').hide()
            $.each(data,function (i,divisions) {
                $(division).append($("<option/>", {
                    value : divisions.division_id,
                    text  : divisions.name.toUpperCase()
                }))

            })
        })
    })
    $('#add-district-clear').on('click', function (e) {
        $('.loader').show()
        e.preventDefault();
        var data = $('#frm-create-district').serialize();
        $.post("{{route('postDistrict')}}", data, function (data) {
            showDistrictInfo(data.name);
            swal('SUCCESS',
                'District Added successfully',
                'success');
            $('.loader').hide()
            $("#division_id_append").val('').trigger('change')
            $("#district_add").val('')
            $("#region_id_append").val('').trigger('change')
        }).fail(function (data,status,error) {
            console.log(data);
            var response = $.parseJSON(data.responseText)
            $('.loader').hide()
            $.each(response.errors, function(key, value){
                swal({
                    title: "ooops!",
                    text: value,
                    icon: "error",
                    color: "#FEFAE3",
                    button: "OK",
                });

            });


        });

    });
    $('#add-district-copy').on('click', function (e) {
        $('.loader').show()
        e.preventDefault();
        var data = $('#frm-create-district').serialize();
        $.post("{{route('postDistrict')}}", data, function (data) {
            showDistrictInfo(data.name);
            swal('SUCCESS',
                'District Added successfully',
                'success');
            $('.loader').hide()
            $("#district_add").val('')
        }).fail(function (data,status,error) {
            console.log(data);
            var response = $.parseJSON(data.responseText)
            $('.loader').hide()
            $.each(response.errors, function(key, value){
                swal({
                    title: "ooops!",
                    text: value,
                    icon: "error",
                    color: "#FEFAE3",
                    button: "OK",
                });

            });


        });

    });


    function showDistrictInfo()
    {
        var data = $('#frm-create-district').serialize();
        console.log(data);
        $.get("{{route('showDistrictInfo')}}", data, function (data) {
            $('#add-district').empty().append(data);
        });
    }
    $(document).on('click', '.edit-district', function (e) {
        $('#show-district').modal('show');
        var id = $(this).val();
        $.get("{{route('editDistrict')}}", {district_id:id}, function (data) {
            console.log(data)
            $('#district_id_edit').val(data.district_id);
            $('#dis_name_edit').val(data.name);
            $('#division_id_edit').val(data.division_id);
            $('#region_id_edit').val(data.region_id);
        });
    });
    $('.btn-update-district').on('click', function (e) {
        e.preventDefault();
        var data = $('#frm-update-district').serialize();
        $.post("{{route('updateDistrict')}}", data, function (data) {
            showDistrictInfo(data.name);
            $('#show-district').modal('hide');
            swal('SUCCESS',
                'District updated successfully',
                'success');
        }).fail(function (data,status,error) {
            console.log(data);
            var response = $.parseJSON(data.responseText)
            $.each(response.errors, function(key, value){
                swal({
                    title: "ooops!",
                    text: value,
                    icon: "error",
                    color: "#FEFAE3",
                    button: "OK",
                });

            });


        });

    });
    $(".select2").select2();


</script>
@endsection
