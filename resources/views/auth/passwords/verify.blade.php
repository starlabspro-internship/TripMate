<form action="{{ route('password.verify.code') }}" method="POST">
    @csrf
    <label for="email">Email Address:</label>
    <input type="email" name="email" id="email" required>
    <label for="code">Verification Code:</label>
    <input type="text" name="code" id="code" required>
    <button type="submit">Verify Code</button>
</form>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
