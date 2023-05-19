<form action="{{ route('users.update', $user) }}" method="POST">
    @method('PUT')
    @csrf

    <section>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $user->name }}">
    </section>

    <section>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}">
    </section>

    <section>
        <label for="password">Password</label>
        <input type="password" name="password" value="{{ $user->password }}">
    </section>

    <button type="submit">Update</button>
</form>
