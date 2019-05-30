@extends('layouts.dashboard')

@section('content')




    <div>
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>
                                <i class="fa fa-list"></i>
                                Site Menu List
                        </b>
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('Language.update',['id'=>$menu->id]) }}" method="post" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for=""> Name </label>
                                <input type="text" placeholder="text" value="{{ $menu->name }}" name="name" class="form-control">
                            </div>
                            <div>
                                <input type="submit"value="Update" class="btn btn-primary" >
                            </div>
                        </form>
                    </div>
                </div>
    </div>

@endsection
