<h1>Update Products</h1>

<form method="POST" action="/products/{{ $product->id }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="{{ $product->name }}">
    <textarea name="description">{{ $product->description }}</textarea>
    <input type="number" name="price"  value="{{ $product->price }}">
    <select name="category_id">
     @foreach ($categories as $category)
         @if ($category->id == $product->category_id)
             <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
         @else
             <option value="{{ $category->id }}">{{ $category->name }}</option>
         @endif
     @endforeach
     </select>
    <button type="submit">Update</button>
</form>

<a href="/products">Back</a>