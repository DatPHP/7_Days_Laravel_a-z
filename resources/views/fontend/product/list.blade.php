@extends('layouts.default')

@section('title', 'Danh sách sản phẩm')

@section('content')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif
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
        @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>
                    <a href="{{ '/product/' . $p->id }}">  {{ $p->name }} </a>

                </td>
                <td class="text-right">{{ number_format($p->price) }}</td>
                <td>{{ $p->content }}</td>
                <td>
                    <img src="{{ Asset($p->image_path) }}" alt="{{ $p->name }}" width="120" height="120">
                </td>
                <td>
                    @if($p->active)
                        <span class="text-success glyphicon glyphicon-ok"></span>
                    @else
                        <span class="text-danger glyphicon glyphicon-remove"></span>
                    @endif
                </td>
                <td>
                    <a href="{{ '/product/' . $p->id . '/edit'}}"><span class="glyphicon glyphicon-pencil">Edit</span></a>

                    {!! Form::open([
                            'route'=>['product.destroy',$p->id],
                            'method'=>'DELETE',
                            'style'=>'display:inline'
                        ]) !!}
                    <button class="btn btn-danger">Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {{ $products->links() }}
@endsection
