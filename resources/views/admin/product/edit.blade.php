@extends('layouts.master')

@section('title', 'Product dashboard')


@section('content')
<div class="container-fluid px-4">


    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="form-floating">
                    <input class="form-control" name="product_code" id="code" value="{{ old('product_code', $product->code) }}" type="number" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Product Code</label>
                    @error('product_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br />
                <div class="form-floating">
                    <input class="form-control" name="product_name" value="{{ old('product_name', $product->name) }}"  id="product_name" type="text" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Product Name</label>
                    @error('product_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br />
                <div class="form-floating">
                    <textarea class="form-control" name="product_description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ old('product_description', $product->description) }}</textarea>
                    <label for="floatingTextarea2">Product Description</label>
                    @error('product_description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                <br />

                <div class="form-floating">
                    <select class="form-select" name="product_category" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($category as $catitem)
                        <option value="{{ $catitem->id }}">{{ $catitem->name }}</option>

                        @endforeach

                      </select>
                    <label for="floatingTextarea">Category</label>
                    @error('product_category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <br />
                <div class="form-floating">
                    <input class="form-control" value="{{ old('display_order_no', $product->display_order_no) }}" name="display_order_no" id="code" type="number" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Display Order No</label>
                    @error('display_order_no')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br />
                <div class="form-floating">
                    <input class="form-control" value="{{ old('product_price', $product->price_created_by) }}" name="product_price" id="code" type="number" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Product Price</label>
                    @error('product_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <br/>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg "  value="save">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
