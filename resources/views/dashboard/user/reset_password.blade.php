
@extends('layouts.dashboard')
@section('content')



<div class="col-xs-12 col-sm-6 col-sm-offset-3 " style="margin-top:40px">
    <div class="widget-box bg-primary">
        <div class="widget-header ">
            <h4 class="widget-title ">Reset Password</h4>

        </div>
        <div class="widget-body">
            <div class="widget-main">
                <form action="{{route('user.profile.password.reseted')}}" method="POST" style="color:black">
                    @csrf
                    <div>
                        <label for="oldpassword">
                            Old Password:
                        </label>

                        <div class="form-group">
                            <input class="form-control" type="password" id="oldpassword" name="oldpassword">
                            @if ($errors->has('oldpassword'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('oldpassword')?:$errors->first('oldpassword') }}</strong>
                                </span>
                            @endif
                            @if(Session::has('wrongpassword'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ Session::get('wrongpassword')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <hr>
                    <div>
                        <label for="newpassword">
                            New Password:
                        </label>

                        <div class="form-group">
                            <input class="form-control " type="password" id="newpassword" name="newpassword">
                            @if ($errors->has('newpassword'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('newpassword')?:$errors->first('newpassword') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <label for="newpassword">
                            Confirm Password:
                        </label>
                        <div class="form-group">
                            <input class="form-control " type="password" id="confirmpassword" name="newpassword_confirmation">

                        </div>
                    </div>
                    <div>
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-refresh bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection






