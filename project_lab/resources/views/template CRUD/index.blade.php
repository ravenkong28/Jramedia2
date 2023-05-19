<form action="{{ route('users.create') }}">
    <button type="submit">Create User</button>
</form>

<form action="{{ route('users.index') }}">
    <label for="q">
        Search:
        <input type="text" name="q">
    </label>
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td style="display: flex; align-items: center; gap: 0.5rem;">
                    <form action="{{ route('users.show', $user) }}">
                        <button type="submit">View</button>
                    </form>
                    <form action="{{ route('users.edit', $user) }}">
                        <button type="submit">Edit</button>
                    </form>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}