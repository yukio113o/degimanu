<h1>New Products</h1>

<form method="POST" action="/products">
    {{ csrf_field() }}
    <input type="text" name="name">
    <textarea name="description"></textarea>
    <input type="number" name="price">
    <select name="category_id">
     @foreach ($categories as $category)
         <option value="{{ $category->id }}">{{ $category->name }}</option>
     @endforeach
     </select>
    <button type="submit">Create</button>
</form>

<a href="/products">Back</a>