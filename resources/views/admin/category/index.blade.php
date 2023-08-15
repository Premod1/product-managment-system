@extends('layouts.master')

@section('title', 'Category dashboard')


@section('content')
<div class="container-fluid px-4">


    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">View Category</h4>
        </div>
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CATEGORY NAME</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>
                    <div>
                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info"> Edit</a>
                        <a href="{{ route('category.delete', $item->id) }}" class="btn btn-danger"> Delete</a>
                    </div>
                </td>
            </tr>
            @endforeach
                </tbody>
              </table>
              {{ $category->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
