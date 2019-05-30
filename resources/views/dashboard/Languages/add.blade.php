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
                        <form action="{{ route('Language.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for=""> Name </label>
                                <input type="text" placeholder="text" name="name" class="form-control">
                            </div>
                                <input type="submit" value="Add" class="btn btn-success" >
                            </div>
                        </form>
                    </div>
                </div>
    </div>

@endsection
