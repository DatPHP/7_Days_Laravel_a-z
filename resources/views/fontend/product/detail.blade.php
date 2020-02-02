@extends('layouts.default')

@section('title', 'Danh sách sản phẩm')

@section('content')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <button class="btn btn-success"> <a href = "{{url('/product')}}"> COME BACK </a> </button>
    <table class="table table-bordered">
        <tr class="success">
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Nội dung</th>
            <th>Ảnh sản phẩm</th>
            <th>Đăng bán</th>
            <th>Action</th>
        </tr>

            <tr>
                <td>{{ $products->id }}</td>
                <td>{{ $products->name }}</td>
                <td class="text-right">{{ number_format($products->price) }}</td>
                <td>{{ $products->content }}</td>
                <td>
                    <img src="{{ Asset($products->image_path) }}" alt="{{ $products->name }}" width="120" height="120">
                </td>
                <td>
                    @if($products->active)
                        <span class="text-success glyphicon glyphicon-ok"></span>
                    @else
                        <span class="text-danger glyphicon glyphicon-remove"></span>
                    @endif
                </td>
                <td>
                    <a href="{{ '/product/' . $products->id . '/edit'}}"><span class="glyphicon glyphicon-pencil">Edit</span></a>
                    <a href="{{ '/product/' . $products->id }}"><span class="glyphicon glyphicon-trash">Delete</span></a>
                </td>
            </tr>
    </table>
@endsection
