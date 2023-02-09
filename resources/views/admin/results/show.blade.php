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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $item)
                    <tr>
                        <td>{{$item->index_number}}</td>
                        <td>{{$item->course_code}}</td>
                        <td>{{$item->level}}</td>
                        <td>{{$item->semester}}</td>
                        <td>{{$item->first_quiz + $item->second_quiz + $item->first_assessment + $item->second_assessment + $item->third_assessment}}</td>
                        <td>{{$item->theory_exam + $item->practical_exam}}</td>
                        <td>{{$item->total_marks}}</td>
                        <td>
                            @php
                                //Calculate the grade
                                $score = $item->total_marks;
                                if ($score == 0) {
                                    echo "IC";
                                } else {
                                    if ($score >= 80 || $score == 100) {
                                        echo "A";
                                    }elseif ($score >= 75) {
                                        echo "B+";
                                    }elseif ($score >= 70) {
                                        echo "B";
                                    }elseif ($score >= 65) {
                                            echo "C+";
                                    }elseif ($score >= 60) {
                                        echo "C";
                                    }elseif ($score >= 55) {
                                        echo "D+";
                                    }elseif ($score >= 50) {
                                        echo "D";
                                    }elseif ($score = 49) {
                                        echo "E";
                                    }
                                }
                                
                                
                            @endphp
                        </td>
                        <td>
                            <button class="btn btn-primary edit-result mr-2" value="{{$item->id}}"><i class="fa fa-edit" title="Edit"></i></button>
                            <button class="btn btn-danger del-result" value="{{$item->id}}"><i class="fa fa-trash" title="Delete"></i></button>
                        </td>
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