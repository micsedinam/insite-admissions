<div class="modal fade" id="show-prog" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Programme</h4>
                <button type="button" class="close"data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form  id="frm-update-prog"  class="form-horizontal" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="prog_id_edit" name="prog_id">
                    <div class="form-group">
                            <label for="dept_name">Department Name</label>
                            <select class="form-control" name="dept_id" id="dept_id_edit">
                                <option value="">Select Department</option>
                                @foreach ($dept as $item)
                                    <option value="{{ $item->id }}">{{ $item->dept_name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                            <label for="dept_name">Programme Name</label>
                            <select class="form-control" name="prog_name" id="prog_name_edit">
                                <option value="">Select Department</option>
                                @foreach ($prog as $item)
                                    <option value="{{ $item->prog_name }}">{{ $item->prog_name }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>

                <div class="modal-footer">
                    {{-- <button data-dismiss="modal" class="btn btn-default" type="button">Close</button> --}}
                    <button class="btn btn-block btn-outline-info btn-update-prog" type="button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>