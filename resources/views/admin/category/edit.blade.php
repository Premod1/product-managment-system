@extends('layouts.master')

@section('title', 'Category dashboard')


@section('content')
<div class="container-fluid px-4">


    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">

                @csrf

                <div class="form-floating">
                    <input class="form-control" value="{{ $category->name }}" name="category" id="category" type="text" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Category</label>
                    @error('category')
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
