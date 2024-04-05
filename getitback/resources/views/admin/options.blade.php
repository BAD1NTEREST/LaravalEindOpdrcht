{{-- resources/views/admin/options.blade.php --}}

<form method="POST" action="{{ route('admin.options.update') }}">
    @csrf
    @method('PUT')

    <label for="kilometer_price">Kilometerprijs:</label>
    <input id="kilometer_price" name="kilometer_price" type="text" value="{{ $kilometer_price }}">

    <button type="submit">Opslaan</button>
</form>
