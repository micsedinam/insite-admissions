<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title" align="center">Continuous Assessment</h5>
        <div class="table-responsive">
            <table id="ca_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Index Number</th>
                    <th>Course Code</th>
                    <th>Quiz One</th>
                    <th>Quiz Two</th>
                    <th>Assessment One</th>
                    <th>Assessment Two</th>
                    <th>Assessment Three</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ca as $item)
                    <tr>
                        <td>{{$item->index_number}}</td>
                        <td>{{$item->course_code}}</td>
                        <td>{{$item->quiz1}}</td>
                        <td>{{$item->quiz2}}</td>
                        <td>{{$item->assessment1}}</td>
                        <td>{{$item->assessment2}}</td>
                        <td>{{$item->assessment3}}</td>
                        <td>{{$item->total_ca}}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary edit-ca" value="{{$item->id}}"><i class="fa fa-edit" title="Edit"></i></button>
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
        $('#ca_table').DataTable( {
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