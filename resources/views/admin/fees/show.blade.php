<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title" align="center">Fee</h5>
        <div class="table-responsive">
            <table id="gen_code_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                </tr>
                </thead>
                <tbody>
                @foreach($feecode as $item)
                    <tr>
                        <td>{{$item->index_number}}</td>
                        <td>{{$item->code}}</td>
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
        $('#gen_code_table').DataTable( {
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