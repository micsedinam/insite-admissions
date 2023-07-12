<div class="modal fade" id="show-assessment" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Assessment</h4>
                <button type="button" class="close"data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form  id="frm-update-ca"  class="form-horizontal" action="" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="ca_id_edit" name="ca_id">

                    <div class="form-group">
                        <label class="label-control">Index Number</label>
                        <input class="form-control" id="index_number_edit" name="index_number">
                    </div>

                    <div class="form-group">
                        <label class="label-control">Course Code</label>
                        <input class="form-control" id="course_code_edit" name="course_code">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="label-control">Quiz One</label>
                                <input class="form-control" id="quiz1_edit" name="quiz1">
                            </div>
                            <div class="col-md-6">
                                <label class="label-control">Quiz Two</label>
                                <input class="form-control" id="quiz2_edit" name="quiz2">
                            </div>
                        </div> 
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="label-control">Assessment One</label>
                                <input class="form-control" id="assessment1_edit" name="assessment1">
                            </div>
                            <div class="col-md-4">
                                <label class="label-control">Assessment Two</label>
                                <input class="form-control" id="assessment2_edit" name="assessment2">
                            </div>
                            <div class="col-md-4">
                                <label class="label-control">Assessment Three</label>
                                <input class="form-control" id="assessment3_edit" name="assessment3">
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="modal-footer">
                    {{-- <button data-dismiss="modal" class="btn btn-default" type="button">Close</button> --}}
                    <button class="btn btn-block btn-outline-info btn-update-ca" type="button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>