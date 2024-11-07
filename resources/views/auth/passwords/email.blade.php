<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <label for="email">Email Address:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Send Verification Code</button>
</form>

@if (session('status'))
    <p>{{ session('status') }}</p>
@endif

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
