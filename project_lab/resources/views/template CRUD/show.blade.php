<table>
    <tr>
        <th>ID</th>
        <td>{{ $user->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $user->email }}</td>
    </tr>
</table>

<hr>

<form action="{{ route('users.posts.store', compact('user')) }}" method="POST">
    @csrf

    <section>
        <label for="title">title</label>
        <input type="text" name="title">
    </section>

    <section>
        <label for="content">Content</label>
        <textarea name="content" cols="30" rows="10"></textarea>
    </section>

    <button type="submit">Create</button>
</form>

<hr>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Creator</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->user->name }}</td>
                
                <td>
                    <form action="{{ route('users.posts.destroy', compact('user', 'post')) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
