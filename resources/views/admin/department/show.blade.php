<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title" align="center">Departments</h5>
        <div class="table-responsive">
            <table id="dept_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dept as $item)
                    <tr>
                        <td>{{$item->dept_name}}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary edit-dept" value="{{$item->id}}"><i class="fa fa-edit" title="Edit"></i></button>
                                {{--<button class="btn btn-danger del-activity" value="{{$a->activity_id}}"><i class="fa fa-window-close" title="Delete"></i></button>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dept_table').DataTable( {
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