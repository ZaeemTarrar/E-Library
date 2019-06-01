@extends('layouts.dashboard')
@section('content')

<div id="user-profile-1" class="user-profile row">
        <div class="col-xs-12 col-sm-6 center">
            <div>
                <span class="profile-picture">
                    {{--  <video width="320" height="240" controls>
                        <source src="{{url('storage/'.$book->file)}}" type="video/mp4">
                        <source src="{{url('storage/'.$book->file)}}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>  --}}
                    <object data="{{url('storage/'.$book->file)}}" type="application/pdf">
                        <embed src="{{url('storage/'.$book->file)}}" type="application/pdf" />
                    </object>

                    <a href="{{url('storage/'.$book->file)}}" >Lool</a>

                    <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/images/avatars/profile-pic.jpg" />
                </span>

                <div class="space-4"></div>

                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                            <i class="ace-icon fa fa-circle light-green"></i>
                            &nbsp;
                            <span class="white">Alex M. Doe</span>
                        </a>


                    </div>
                </div>
            </div>

            <div class="space-6"></div>



            <div class="hr hr16 dotted"></div>
        </div>

        <div class="col-xs-12 col-sm-6">


            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Username </div>

                    <div class="profile-info-value">
                        <span class="editable" id="username">alexdoe</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Location </div>

                    <div class="profile-info-value">
                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                        <span class="editable" id="country">Netherlands</span>
                        <span class="editable" id="city">Amsterdam</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Age </div>

                    <div class="profile-info-value">
                        <span class="editable" id="age">38</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Joined </div>

                    <div class="profile-info-value">
                        <span class="editable" id="signup">2010/06/20</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Last Online </div>

                    <div class="profile-info-value">
                        <span class="editable" id="login">3 hours ago</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> About Me </div>

                    <div class="profile-info-value">
                        <span class="editable" id="about">Editable as WYSIWYG</span>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>



@endsection


