<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h1>Login</h1>

@if ($errors->any())
  <div style="color:red;">
    <ul>
      @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="/login">
  @csrf
  <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="/register">Register here</a></p>
</body>
</html>