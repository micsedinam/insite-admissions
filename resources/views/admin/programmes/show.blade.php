<div class="card mb-4">
    <div class="col-md-12">
        <div class="card-body">
            <h5 class="card-title" align="center">Programmes</h5>
            <div class="table-responsive">
                <table id="prog_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Programme</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prog as $item)
                        <tr>
                            <td>{{$item->prog_name}}</td>
                            <td>{{$item->dept_name}}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary edit-prog" value="{{$item->id}}"><i class="fa fa-edit" title="Edit"></i></button>
                                    {{--<button class="btn btn-danger del-activity" value="{{$a->activity_id}}"><i class="fa fa-window-close" title="Delete"></i></button>--}}
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tfoot>
                </table>

            </div>

        </div>
    </div>
</div>
<script>
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