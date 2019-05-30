@extends('layouts.dashboard')
@section('content')



<div class="center"  style="margin-top: 1em">
        <a href="{{route('user.profile.edit',['id'=>$user->id])}}" class="btn btn-sm btn-primary btn-white btn-round">
            <i class="ace-icon fa fa-edit bigger-150 middle orange2"></i>
            <span class="bigger-110">Edit</span>

            <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
        </a>
    </div>
<div style="margin-top: 3em">
    <div id="user-profile-1" class="user-profile row">

        <div class="col-xs-12 col-sm-3 center">
            <div>
                <span class="profile-picture">
                    @if($user->snap!='')
                        <img id="avatar" class="editable img-responsive" alt="{{ucfirst($user->name)}}'s Avatar" src="{{url('storage/'.$user->snap)}}" style="width: 180px; height: 200px"/>
                    @else
                        <img id="avatar" class="editable img-responsive" alt="{{ucfirst($user->name)}}'s Avatar" src="{{url('storage/images/user-placeholder.png')}}" style="width: 180px; height: 200px"/>
                    @endif
                </span>

                <div class="space-4"></div>

                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                            <i class="ace-icon fa fa-circle light-green"></i>
                            &nbsp;
                            <span class="white">{{( ($user->first_name==''||$user->last_name=='')?ucfirst($user->name):ucfirst($user->first_name).' '.ucfirst($user->last_name))}}</span>
                        </a>


                    </div>
                </div>
                <div>
                    <h4><a href="{{route('user.profile.password.reset')}}"><i class="fa fa-retweet" ></i> Reset Password</a></h4>
                </div>
            </div>

            <div class="space-6"></div>

            <div class="profile-contact-info">
                {{--  <div class="profile-contact-links align-left">
                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
                        Add as a friend
                    </a>

                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                        Send a message
                    </a>

                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                        www.alexdoe.com
                    </a>
                </div>  --}}

                <div class="space-6"></div>

                {{--  <div class="profile-social-links align-center">

                    <a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
                        <i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
                    </a>

                    <a href="#" class="tooltip-info" title="" data-original-title="Visit my Twitter">
                        <i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
                    </a>

                    <a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
                        <i class="middle ace-icon fa fa-pinterest-square fa-2x red"></i>
                    </a>
                </div>  --}}
            </div>

            <div class="hr hr12 dotted"></div>
            @if(App\User::find(Auth::user()->id)->role->access==2)
             <div class="clearfix">
                <div class="grid1">
                    <span class="bigger-175 blue">{{count(App\PostModel::where('user_id',Auth::user()->id)->get())}}</span>

                    <br />
                    Total Posts
                </div>

            </div>
            @endif

            <div class="hr hr16 dotted"></div>
        </div>

        <div class="col-xs-12 col-sm-9">


            <div class="space-12"></div>

            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Username </div>

                    <div class="profile-info-value">
                        {{ucfirst($user->name)}}
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Email </div>

                    <div class="profile-info-value">
                            {{$user->email}}
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Age </div>

                    <div class="profile-info-value">
                        {{($user->dob!=null)?Carbon\Carbon::parse($user->dob)->age:'N/A'}}
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Joined </div>

                    <div class="profile-info-value">
                        {{$user->created_at->format('F d,Y')}}
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Gander </div>

                    <div class="profile-info-value">
                        {{ ($user->gender) ? 'Male':'Female'}}
                    </div>
                </div>
            <div class="profile-info-row">
                        <div class="profile-info-name"> Role </div>

                        <div class="profile-info-value">
                            {{ucfirst($user->role->name)}}
                        </div>
                    </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> About Me </div>

                    <div class="profile-info-value">
                        {{($user->about!='')?$user->about:'N/A'}}
                    </div>
                </div>

            </div>

            <div class="space-20"></div>



            <div class="hr hr2 hr-double"></div>

            <div class="space-6"></div>


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

@section('script')
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





