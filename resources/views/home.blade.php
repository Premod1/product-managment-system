@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <h4 class="card-header">{{ __('Products Show') }}</h4>
                  <div class="card-body">
                    <div class="card-group">
                        @foreach ( $product as $item )
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('uploads/products/'.$item->image) }}" alt="Product Image" style="max-width: 100%; max-height: 600px;">
                                        <div class="card-body">
                                            <hr />
                                            <h5>{{ $item->code }}</h5>
                                            <h5 class="card-title"> Product Name: {{ $item->name }}</h5>
                                            <h5>Category Name: {{ $item->category->name }}</h5>
                                            <h5>Price: RS. {{ $item->price_created_by }}</h5>
                                            <hr />
                                            <p class="card-text">{{ $item->description }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Last updated {{ $item->updated_at->diffForHumans() }}</small>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
