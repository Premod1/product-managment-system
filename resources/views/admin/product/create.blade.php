@extends('layouts.master')

@section('title', 'product dashboard')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Create Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"> Create Product</li>
    </ol>
    <div class="row">
        <form action="">

            <div class="form-floating">
                <input class="form-control" id="floatingTextarea" type="number" placeholder="Leave a comment here" />
                <label for="floatingTextarea">Code</label>
            </div>
            <br />
            <div class="form-floating">
                <input class="form-control" id="floatingTextarea" placeholder="Leave a comment here" />
                <label for="floatingTextarea">Name</label>
            </div>
            <br />
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" rows="10" cols="100"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>
            <br />
            <div class="form-floating">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                <label for="floatingTextarea">Category</label>
            </div>
            <br />
            <div class="form-floating">
                <input class="form-control" id="floatingTextarea" placeholder="Leave a comment here" />
                <label for="floatingTextarea">Display Order No</label>
            </div>
            <br />
            <div class="form-floating">
                <input class="form-control" id="floatingTextarea" placeholder="Leave a comment here" />
                <label for="floatingTextarea">Price</label>
            </div>
            <br/>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg "  value="save">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
