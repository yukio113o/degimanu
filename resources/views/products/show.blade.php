@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <div class="row w-75">
        <div class="col-5 offset-1">
            @if ($product->image !== null)
            <img src="{{ asset('storage/products/'.$product->image) }}" class="w-100 img-fluid">
            @else
            <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fuild">
            @endif
        </div>
        <div class="col">
            <div class="d-flex flex-column">
                <h1 class="">
                    {{$product->name}}
                </h1>
                <p class="d-flex">
                    {{$product->description}}
                </p>
                <hr>
                <p class="d-flex align-items-end">
                    ￥{{$product->price}}(税込)
                </p>
                <hr>
            </div>
        </div>

        <div class="offset-1 col-11">
            <hr class="w-100">
            <h3 class="float-left">コメント</h3>
        </div>

        <div class="offset-1 col-10">
            <div class="row">
                 @foreach($reviews as $review)
                 <div class="offset-md-5 col-md-5">
                     <p class="h3">{{$review->content}}</p>
                     <label>{{$review->created_at}}</label>
                 </div>
                 @endforeach
             </div>
 
             @auth
             <div class="row">
                 <div class="offset-md-5 col-md-5">
                     <form method="POST" action="/products/{{ $product->id }}/reviews">
                         {{ csrf_field() }}
                         <textarea name="content" class="form-control m-2"></textarea>
                         <button type="submit" class="btn submit-button ml-2">コメントを追加</button>
                     </form>
                 </div>
             </div>
             @endauth
        </div>
    </div>
</div>
@endsection