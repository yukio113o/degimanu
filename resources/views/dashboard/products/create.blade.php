@extends('layouts.dashboard')

@section('content')
<div class="w-50">
    <h1>商品登録</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    <form method="POST" action="/dashboard/products" class="mb-5" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-name" class="col-2 d-flex justify-content-start">商品名</label>
            <input type="text" name="name" id="product-name" class="form-control col-8">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-price" class="col-2 d-flex justify-content-start">価格</label>
            <input type="number" name="price" id="product-price" class="form-control col-8">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-category" class="col-2 d-flex justify-content-start">カテゴリ</label>
            <select name="category_id" class="form-control col-8" id="product-category">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label class="col-2 d-flex justify-content-start">画像</label>
            <img src="#" id="product-image-preview" id="product-image-preview" class="img-fluid w-25">
            <div class="d-flex flex-column ml-2">
                <label for="product-image" class="btn submit-button">画像を選択</label>
                <input type="file" name="image" id="product-image" onChange="handleImage(this.files)" style="display: none;" >
            </div>
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-description" class="col-2 d-flex justify-content-start align-self-start">商品説明</label>
            <textarea name="description" id="product-description" class="form-control col-8" rows="10"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            {{ csrf_field() }}
            <button type="submit" class="w-25 btn submit-button">商品を登録</button>
        </div>
    </form>

    <div class="d-flex justify-content-end">
        <a href="/dashboard/products">商品一覧に戻る</a>
    </div>
</div>

<script type="text/javascript">
      function handleImage(image) {
          let reader = new FileReader();
          reader.onload = function() {
              let imagePreview = document.getElementById("product-image-preview");
              imagePreview.src = reader.result;
          }
          console.log(image);
          reader.readAsDataURL(image[0]);
      }
  </script>
@endsection 