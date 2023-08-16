@extends('layouts.master')

@section('title', 'Product dashboard')


@section('content')
<div class="container-fluid px-4">


    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">View Product <a href="{{ url('admin/add-product')}}" class="btn btn-primary btn-lg float-end">Add Product</a></h4>
        </div>
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table id="myDataTable" class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">CODE</th>
                <th scope="col">NAME</th>
                <th scope="col">DESC</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">ORDER NO</th>
                <th scope="col">PRICE</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->display_order_no }}</td>
                    <td>{{ $product->price_created_by }}</td>
                    <td>
                        <div>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"> Edit</a>
                            <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger"> Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
              {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
