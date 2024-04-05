{{-- resources/views/admin/options/index.blade.php --}}

@extends('layouts.app') <!-- Make sure this is the correct path to your layout file -->

@section('content')
<form action="{{ route('admin.options.update') }}" method="POST">
    @csrf
    <label for="kilometer_price">Kilometerprijs:</label>
    <input type="text" name="kilometer_price" id="kilometer_price" value="{{ $kilometerPrice }}" required>
    <button type="submit">Opslaan</button>
</form>
@endsection
