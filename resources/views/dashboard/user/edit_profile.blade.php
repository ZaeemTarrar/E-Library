@extends('layouts.dashboard')
@section('content')




<div class="show">
    <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <form action="{{route('user.profile.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="tab-content no-border padding-24">
                    <div id="home" class="tab-pane in active">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 center">
                                <span class="profile-picture">
                                @if($user->snap!='')
                                    <img id="avatar" class="editable img-responsive" alt="{{ucfirst($user->name)}}'s Avatar" src="{{url('storage/'.$user->snap)}}" style="width: 180px; height: 200px"/>
                                @else
                                    <img id="avatar" class="editable img-responsive" alt="{{ucfirst($user->name)}}'s Avatar" src="{{url('storage/images/user-placeholder.png')}}" style="width: 180px; height: 200px"/>
                                @endif


                                </span>
                                <p>Click on profile picture. <input type="file" name="snap" class="hidden" id="imgInp"></p>
                                <div class="center"  style="margin-top: 1em">
                                    <button type="submit" class="btn btn-sm btn-primary btn-white btn-round">
                                        <i class="ace-icon fa fa-edit bigger-150 middle orange2"></i>
                                        <span class="bigger-110">Update</span>

                                        <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                                    </button>
                                    </div>
                                <div class="space space-4"></div>




                            </div><!-- /.col -->

                            <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                       <div class="row">
                                            <label class="col-sm-2 control-label no-padding-right">First Name</label>

                                            <div class="col-sm-10">
                                                <input class="form-control" name="firstname" type="text"placeholder="First Name" value="{{$user->firstname}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label no-padding-right">Last Name</label>

                                            <div class="col-sm-10">
                                                <input class="form-control" name="lastname" type="text"placeholder="Last Name" value="{{$user->lastname}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label no-padding-right">Contaact Number</label>

                                            <div class="col-sm-10">
                                                <input class="form-control" name="contact_number" type="text"placeholder="Contact Number" value="{{$user->contact_number}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label no-padding-right">About</label>

                                            <div class="col-sm-10">
                                                <textarea id="my-input" class="form-control" name="about"rows="3" placeholder="About">{{$user->about}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label no-padding-right">Gender</label>

                                            <div class="col-sm-10">
                                                <label class="inline">
                                                    <input name="gender" value="1" type="radio" class="ace" {{($user->gender)?'checked':''}}>
                                                    <span class="lbl middle"> Male</span>
                                                </label>

                                                &nbsp; &nbsp; &nbsp;
                                                <label class="inline">
                                                    <input name="gender" value="0"type="radio" class="ace" {{(!$user->gender)?'checked':''}}>
                                                    <span class="lbl middle"> Female</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label no-padding-right" for="form-field-date">Birth Date</label>

                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                        <input class="form-control date-picker" name="dob" id="id-date-picker-1" type="text" value="{{date('d-m-Y',strtotime($user->dob))}}" data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar bigger-110"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>


                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="space-20"></div>


                    </div><!-- /#home -->


                </div>
            </form>
        </div>
    </div>
</div>


@endsection


@section('style')
<link rel="stylesheet" href="{{url('dashboard/css/jquery-ui.custom.min.css')}}" />
<link rel="stylesheet" href="{{url('dashboard/css/jquery.gritter.min.css')}}" />
<link rel="stylesheet" href="{{url('dashboard/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{url('dashboard/css/bootstrap-datepicker3.min.css')}}" />
<link rel="stylesheet" href="{{url('dashboard/css/bootstrap-editable.min.css')}}" />
@endsection
@section('script-plugin')
<script src="{{url('dashboard/js/jquery-ui.custom.min.js')}}"></script>
<script src="{{url('dashboard/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{url('dashboard/js/jquery.gritter.min.js')}}"></script>
<script src="{{url('dashboard/js/bootbox.js')}}"></script>
<script src="{{url('dashboard/js/jquery.easypiechart.min.js')}}"></script>
<script src="{{url('dashboard/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('dashboard/js/jquery.hotkeys.index.min.js')}}"></script>
<script src="{{url('dashboard/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{url('dashboard/js/select2.min.js')}}"></script>
<script src="{{url('dashboard/js/spinbox.min.js')}}"></script>
<script src="{{url('dashboard/js/bootstrap-editable.min.js')}}"></script>
<script src="{{url('dashboard/js/ace-editable.min.js')}}"></script>
<script src="{{url('dashboard/js/jquery.maskedinput.min.js')}}"></script>

@endsection
@section('script')
 <script type="text/javascript">
    $('#avatar').click(function(){ $('#imgInp').trigger('click'); });
    function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#avatar').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgInp").change(function() {
        readURL(this);
      });
      $('.date-picker').datepicker().next().on(ace.click_event, function(){
        $(this).prev().focus();
    })
    </script>
@endsection





