<hr>

<div class="col-md-10 offset-md-1">
    <div class="card border-bottom-warning">
        <div class="card-body text-center">
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