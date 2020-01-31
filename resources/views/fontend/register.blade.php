@extends('layouts.default')

@section('title', 'Đăng ký')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            Thông tin đăng ký không đầy đủ, bạn cần chỉnh sửa như sau:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (isset($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    {!! Form::open(array('url' => '/register', 'class' => 'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Họ và tên *', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-9">
            {!! Form::text('name', '', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Địa chỉ email *', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-9">
            {!! Form::email('email', '', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Mật khẩu *', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-9">
            {!! Form::password('password', ['class' => 'form-control','placeholder' => '*Password']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password_comfirmation', 'Nhập lại mật khẩu *', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-9">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '*Password Confirm']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('website', 'Website', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-9">
            {!! Form::text('website', '', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            {!! Form::submit('Đăng ký', array('class' => 'btn btn-success')) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
