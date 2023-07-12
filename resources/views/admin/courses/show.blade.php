<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title" align="center">Courses</h5>
        <div class="table-responsive">
            <table id="courses_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Credit Hours</th>
                    <th>Level</th>
                    <th>Semester</th>
                    {{-- <th>Action</th> --}}
                </tr>
                </thead>
                <tbody>
                @foreach($course as $item)
                    <tr>
                        <td>{{$item->course_code}}</td>
                        <td>{{$item->course_title}}</td>
                        <td>{{$item->credit_hours}}</td>
                        <td>{{$item->level}}</td>
                        <td>{{$item->semester}}</td>
                        {{-- <td>
                            <div class="btn-group">
                                <button class="btn btn-primary edit-dept" value="{{$item->id}}"><i class="fa fa-edit" title="Edit"></i></button>
                                <button class="btn btn-danger del-activity" value="{{$a->activity_id}}"><i class="fa fa-window-close" title="Delete"></i></button>
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
        $('#courses_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>