<form action="{{ route('rent.store') }}" method="POST">
    @csrf

    <input type="text" name="name">
    <input type="number" name="price">
    
    <button type="submit">Save</button>
</form>