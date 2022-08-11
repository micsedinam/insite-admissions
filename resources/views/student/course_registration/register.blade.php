<div class="modal fade" id="show-register-course" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fee Payment Verification</h4>
                <button type="button" class="close"data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form  id="frm-access-courses"  class="form-horizontal" action="{{ route('access.courses') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="" name="">
                    <div class="form-group">
                        <label for="dept_name">Enter Fee Payment Verification code <small class="text-dark">(Contact your admin)</small></label>
                        <input type="text" class="form-control" name="code" id="fee_payment_code">
                    </div>
                </div>

                <div class="modal-footer">
                    {{-- <button data-dismiss="modal" class="btn btn-default" type="button">Close</button> --}}
                    <button class="btn btn-block btn-outline-info" type="submit">Verify</button>
                </div>
            </form>
        </div>
    </div>
</div>