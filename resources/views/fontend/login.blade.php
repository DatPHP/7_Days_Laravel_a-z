@extends('layouts.default')

@section('title', 'Đăng nhập')

@section('content')
    @if(isset($success))
        <div class="alert alert-success" role="alert">{{ $success }}</div>
    @endif
    @if(isset($fail))
        <div class="alert alert-danger" role="alert">{{ $fail }}</div>
    @endif

    {!! Form::open(array('url' => '/login', 'class' => 'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('username', '', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::password('password', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Login', array('class' => 'btn btn-success')) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
