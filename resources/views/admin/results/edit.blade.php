<div class="modal fade" id="show-result" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Student Result</h4>
                <button type="button" class="close"data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form  id="frm-update-result"  class="form-horizontal" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="result_id_edit" name="result_id">

                    <div class="form-group">
                        <label for="course_code" class="label-control">Course Code</label>
                        <input type="text" class="form-control" name="course_code" id="course_code_edit">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dept" class="label-control">Department</label>
                                <select name="dept_id" id="dept_id_edit" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach($dept as $key => $dept)
                                        <option value="{{$dept->id}}">{{strtoupper($dept->dept_name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="index_number" class="label-control">Index Number</label>
                                <select name="index_number" id="index_number_edit" class="form-control">
                                    <option value="">Select Department First</option>
                                    @foreach($index_number as $key => $index_number)
                                        <option value="{{$index_number->index_number}}">{{$index_number->index_number}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="label-control">Level</label>
                                <select name="level" id="level_edit" class="form-control">
                                    <option value="">Select Level</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="label-control">Semseter</label>
                                <select name="semester" id="semester_edit" class="form-control">
                                    <option value="">Select Semseter</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_quiz" class="label-control">First Quiz</label>
                                <input type="text" class="form-control" name="first_quiz" id="first_quiz_edit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="second_quiz" class="label-control">Second Quiz</label>
                                <input type="text" class="form-control" name="second_quiz" id="second_quiz_edit">
                            </div>
                        </div>
                    </div>

                    <div class="loader"></div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_assessment" class="label-control">First Assessment</label>
                                <input type="text" class="form-control" name="first_assessment" id="first_assessment_edit"> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="second_assessment" class="label-control">Second Assessment</label>
                                <input type="text" class="form-control" name="second_assessment" id="second_assessment_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="third_assessment" class="label-control">Third Assessment</label>
                                <input type="text" class="form-control" name="third_assessment" id="third_assessment_edit">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="theory_exam" class="label-control">Exam (Theory)</label>
                                <input type="text" class="form-control" name="theory_exam" id="theory_exam_edit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="practical_exam" class="label-control">Exam (Practical)</label>
                                <input type="text" class="form-control" name="practical_exam" id="practical_exam_edit">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-block btn-outline-info btn-update-result" type="button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>