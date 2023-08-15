@extends('layouts.master')

@section('title', 'Product dashboard')


@section('content')
<div class="container-fluid px-4">


    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Create Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-floating">
                    <input class="form-control" name="product_code" id="code" type="number" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Product Code</label>
                </div>
                <br />
                <div class="form-floating">
                    <input class="form-control" name="product_name" id="code" type="number" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Product Name</label>
                </div>
                <br />
                <div class="form-floating">
                    <textarea class="form-control" name="product_description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Product Description</label>
                  </div>
                <br />
                <div class="form-floating">
                    <select class="form-select" name="product_category" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    <label for="floatingTextarea">Category</label>
                </div>
                <br />
                <div class="form-floating">
                    <input class="form-control" name="display_order_no" id="code" type="number" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Display Order No</label>
                </div>
                <br />
                <div class="form-floating">
                    <input class="form-control" name="product_price" id="code" type="number" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Product Price</label>
                </div>

                <br/>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg "  value="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
