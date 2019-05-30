@extends('layouts.dashboard')

@section('content')

    <a href="{{ route('Language.create') }}" class="btn btn-success">
        <i class="fa fa-plus"></i>
        Add Language
    </a>

    <div>
        <br><br>
    </div>

    <div>
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>
                                <i class="fa fa-list"></i>
                                Site Menu List
                        </b>
                    </div>

                    <div class="panel-body">
                            <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th> - </th>
                                            <th> - </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menu as $item)
                                            <tr>


                                                <td>{{ $item->name }}</td>

                                                <td>
                                                    <a href="{{ route('Language.edit',[ 'id' => $item->id ]) }}" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    {{-- <a method="delete" href="{{ route('topmenu.destroy' , ['id'=> $item->id] ) }}" class="btn btn-danger btn-xs">
                                                            <i class="fa fa-trash"></i>
                                                    </a> --}}
                                                    {{-- Made Form instead of Anchor --}}
                                                    {{-- Route Path of Parameter --}}
                                                    {{-- Input Bar recieve Delete Value method --}}
                                                    <form action="{{ route('Language.destroy',['id'=> $item->id ]) }}" method="post" >
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="delete" name="_method" >
                                                        <div>
                                                            <button type="submit" class="btn btn-danger btn-xs" >
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                    {{-- <a  href="{{ route('foo.del', ['id'=>$item->id] ) }}" class="btn btn-info btn-xs">
                                                            <i class="fa fa-home"></i>
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
    </div>

@endsection
