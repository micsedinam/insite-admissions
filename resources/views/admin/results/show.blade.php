<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title" align="center">Student Results</h5>
        <div class="table-responsive">
            <table id="results_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Index Number</th>
                    <th>Course Code</th>
                    <th>Level</th>
                    <th>Semester</th>
                    <th>Assessment</th>
                    <th>Exam</th>
                    <th>Total</th>
                    <th>Grade</th>
                    {{-- <th>Action</th> --}}
                </tr>
                </thead>
                <tbody>
                @foreach($result as $item)
                    <tr>
                        <td>{{$item->index_number}}</td>
                        <td>{{$item->course_code}}</td>
                        <td>{{$item->level}}</td>
                        <td>{{$item->semester}}</td>
                        <td>{{$item->continuous_assessment}}</td>
                        <td>{{$item->exam_score}}</td>
                        <td>{{$item->total_score}}</td>
                        <td>
                            @php
                                //Calculate the grade
                                $score = $item->total_score;
                                switch ($score) {
                                    case $score >=80 || $score==100:
                                        echo "A";
                                        break;
                                    case $score >=75:
                                        echo "B+";
                                        break;
                                    case $score >=70:
                                        echo "B";
                                        break;
                                    case $score >=65:
                                        echo "C+";
                                        break;
                                    case $score >=60:
                                        echo "C";
                                        break;
                                    case $score >=55:
                                        echo "D+";
                                        break;
                                    case $score >=50:
                                        echo "D";
                                        break;
                                    case $score <49 || $score==0:
                                        echo "E";
                                        break;
                                }
                            @endphp
                        </td>
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
        $('#results_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>