@extends('layouts.dashboard')
@section('content')

<div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">

        <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
                <div class="widget-header">
                    <h5 class="widget-title bigger lighter">
                        <i class="ace-icon fa fa-book"></i>
                        Flip Book
                    </h5>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{route('book.update',['id'=>$book->id])}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group row">

                                            <label class="col-sm-3 control-label no-padding-right" for="language"> Language </label>

                                            <div class="col-sm-9">
                                                <select name="language" id="language"  class="form-control {{ $errors->has('language') ? ' has-error' : '' }}" >
                                                    <option value="">- select Language -</option>
                                                    @foreach ($Language as $item)
                                                        <option value="{{$item->id}}" {{$item->id==old('language')||$item->id==$book->language->id?'selected':''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('language'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('language') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label class="col-sm-3 control-label no-padding-right" for="author"> Author </label>

                                        <div class="col-sm-9">
                                            <input type="text"   value="{{old('author')==null?$book->author:old('author') }} " placeholder="Auther" name="author" id="author"  class="form-control {{ $errors->has('author') ? ' has-error' : '' }}" >
                                            @if ($errors->has('author'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('author') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label class="col-sm-3 control-label no-padding-right" for="name"> Book Name </label>

                                        <div class="col-sm-9">
                                            <input type="text"  value="{{old('name')==null?$book->name:old('name') }}"  placeholder="Book Name" name="name" id="name"  class="form-control{{ $errors->has('language') ? ' has-error' : '' }}" >
                                             @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label class="col-sm-3 control-label no-padding-right" for="grade"> Grade </label>

                                        <div class="col-sm-9">
                                            <select name="grade" id="grade"  class="form-control {{ $errors->has('grade') ? ' has-error' : '' }}" >
                                                <option value="">- select Grade -</option>
                                                @foreach ($Grade as $item)
                                                    <option value="{{$item->id}}" {{$item->id==old('grade')||$item->id==$book->grade->id?'selected':''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                             @if ($errors->has('grade'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('grade') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label class="col-sm-3 control-label no-padding-right" for="category"> Category </label>

                                        <div class="col-sm-9">
                                            <select name="category" id="category"  class="form-control {{ $errors->has('category') ? ' has-error' : '' }}" >
                                                <option value="">- Select Category -</option>
                                                @foreach ($Category as $item)
                                                    <option value="{{$item->id}}" {{$item->id==old('category')||$item->id==$book->category->id?'selected':''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                             @if ($errors->has('category'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label class="col-sm-3 control-label no-padding-right" for="recommendation">Recommendation</label>

                                        <div class="col-sm-9">
                                            <input type="text" value="{{old('recommendation')==null?$book->recommendation:old('recommendation') }}" placeholder="Recommendation" name="recommendation" id="recommendation"  class="form-control{{ $errors->has('recommendation') ? ' has-error' : '' }}" >
                                             @if ($errors->has('recommendation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('recommendation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label class="col-sm-3 control-label no-padding-right" for="pages">Pages</label>

                                        <div class="col-sm-9">
                                            <input type="number" placeholder="Pages" value="{{old('pages')==null?$book->pages:old('pages')}}" name="pages" id="pages"  class="form-control{{ $errors->has('pages') ? ' has-error' : '' }}" >
                                            @if ($errors->has('pages'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pages') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">

                                        <label class="col-sm-3 control-label no-padding-right" for="book">File or Book</label>

                                        <div class="col-sm-9">
                                            <input type="file" placeholder="book" name="book" id="book"  class="form-control{{ $errors->has('book') ? ' has-error' : '' }}" >
                                            @if ($errors->has('book'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('book') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label class=" inline">
                                        <small class="muted smaller-90">Active:</small>
                                        <input id="id-button-borders" name="active" {{$book->active==1?'checked':''}} type="checkbox" class="ace ace-switch ace-switch-5">
                                        <span class="lbl middle"></span>
                                    </label>
                                </div>
                                <div class="col-lg-12">
                                    <span class="text-warning"><b>Note:</b> If you not select any file, old file reamaining same.</span>
                                    <button type="submit" class="btn btn-warning pull-right">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection



