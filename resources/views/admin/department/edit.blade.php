<div class="modal fade" id="show-dept" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Department</h4>
                <button type="button" class="close"data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form  id="frm-update-dept"  class="form-horizontal" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="dept_id_edit" name="dept_id">
                    <div class="form-group">
                            <label for="dept_name">Department Name</label>
                            <input type="text" name="dept_name" id="dept_name_edit" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    {{-- <button data-dismiss="modal" class="btn btn-default" type="button">Close</button> --}}
                    <button class="btn btn-block btn-outline-info btn-update-dept" type="button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>