@extends('layouts.master')

@section('title', 'Category dashboard')


@section('content')
<div class="container-fluid px-4">


    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Create Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-floating">
                    <input class="form-control" name="category" id="category" type="text" placeholder="Leave a comment here" />
                    <label for="floatingTextarea">Category</label>
                    @error('category')
                       <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
