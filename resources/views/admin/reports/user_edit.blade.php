<div class="modal fade" id="show-user-edit" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close"data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form  id="frm-update-user"  class="form-horizontal" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="user_id_edit" name="user_id">
                    <div class="form-group">
                        <label for="dept_name">User Type</label>
                        <select class="form-control" name="is_admin" id="user_type_edit">
                            {{-- <option value="">Select User Type</option> --}}
                            <option value="0">New Applicant</option>
                            <option value="2">Continuing Student</option>
                            <option value="1">System Admin</option>
                            <option value="3">School Administrator</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    {{-- <button data-dismiss="modal" class="btn btn-default" type="button">Close</button> --}}
                    <button class="btn btn-block btn-outline-info btn-update-user" type="button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>