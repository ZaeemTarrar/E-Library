
@if( Session::has('message') )
<div>
        <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
               <p>
                   <b>
                       Notification
                   </b>
                   <div>
                       {{ Session::get('message') }}
                   </div>
               </p>
        </div>
</div>
@endif

@if( Session::has('upgrade') )
<div>
        <div class="alert alert-block alert-info">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
               <p>
                   <b>
                       Notification
                   </b>
                   <div>
                       {{ Session::get('upgrade') }}
                   </div>
               </p>
        </div>
</div>
@endif

@if( Session::has('error') )
<div>
        <div class="alert alert-block alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
               <p>
                   <b>
                       Notification
                   </b>
                   <div>
                       {{ Session::get('error') }}
                   </div>
               </p>
        </div>
</div>
@endif

