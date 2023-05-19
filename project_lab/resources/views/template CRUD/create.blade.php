<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <section>
        <label for="name">Name</label>
        <input type="text" name="name">
    </section>

    <section>
        <label for="email">Email</label>
        <input type="email" name="email">
    </section>

    <section>
        <label for="password">Password</label>
        <input type="password" name="password">
    </section>

    <button type="submit">Create</button>
</form>
