{{-- resources/views/admin/rides/index.blade.php --}}
<x-admin-layout>
    <h1>Ritten Beheer</h1>
    <table>
        <thead>
            <tr>
                <th>Pickup Locatie</th>
                <th>Dropoff Locatie</th>
                <th>Status</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rides as $ride)
                <tr>
                    <td>{{ $ride->pickup_location }}</td>
                    <td>{{ $ride->dropoff_location }}</td>
                    <td>{{ $ride->status }}</td>
                    <td>
                        <!-- Form to change status -->
                        <form method="POST" action="{{ route('admin.rides.update', $ride) }}">
                            @csrf
                            @method('PUT')
                            <select name="status">
                                <option value="pending" {{ $ride->status === 'pending' ? 'selected' : '' }}>In afwachting</option>
                                <option value="underway" {{ $ride->status === 'underway' ? 'selected' : '' }}>Onderweg</option>
                                <option value="completed" {{ $ride->status === 'completed' ? 'selected' : '' }}>Afgerond</option>
                            </select>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
