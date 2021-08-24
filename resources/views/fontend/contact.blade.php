@extends('layouts.default')
@section('title', 'All laravel')
@section('content')
    {{-- <form action = "/contact" method = "post"> --}}
        {!! Form::open(array('url' => '/contact')) !!}
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <table>
        <tr>
            <td>Họ và tên</td>
            <td><input type = "text" name = "name" <?php if(isset($name)) echo 'value = "' . $name . '"'?>/></td>
        </tr>

        <tr>
            <td>Địa chỉ email</td>
            <td><input type = "text" name = "email" <?php if(isset($email)) echo 'value = "' . $email . '"'?>/></td>
        </tr>

        <tr>
            <td>Tiêu đề</td>
            <td>
                {!! Form::text('title', isset($title)?$title:'') !!}
                {{-- <input type = "text" name = "title" /> --}}
            </td>
        </tr>

        <tr>
            {{-- <td>Nội dung</td> --}}
            {!! Form::label('content', 'Noi dung') !!}
            <td>
                {!! Form::textarea('massage', '', array('rows'=> '5')) !!}
                {{-- <textarea name="message" rows="5"></textarea> --}}
            </td>
        </tr>

        <tr>
            <td colspan = "2" align = "center">
                {{-- <input type = "submit" value = "Gửi" /> --}}
                {!! Form::submit('Gửi') !!}
            </td>
        </tr>
        </table>
    {{-- </form> --}}
    {!! Form::close() !!}
@endsection
