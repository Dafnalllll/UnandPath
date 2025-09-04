<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>UnandPath | Sign Up</title>
  <link rel="stylesheet" href="/css/signup.css" />
  <link rel="icon" href="https://img.icons8.com/ios-filled/50/000000/book.png" type="image/png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <div class="signup-container">
    <h1>Sign Up</h1>
    <form id="signup-form" action="{{ route('signup.submit') }}" method="POST" novalidate>
      @csrf

      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" id="fullname" name="name" placeholder="Full Name" required autocomplete="name" />
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" id="email" name="email" placeholder="Email" required autocomplete="email" />
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="Password" required minlength="8" />
        <span class="toggle-password" toggle="#password"><i class="fas fa-eye"></i></span>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required minlength="8" />
        <span class="toggle-password" toggle="#password_confirmation"><i class="fas fa-eye"></i></span>
      </div>

      <button type="submit">Register</button>

      @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
      @endif

      <p id="error-message" style="color: red;">
        @if ($errors->any())
          {{ $errors->first() }}
        @endif
      </p>

      <div class="login-link">
        Sudah Punya Akun? <a href="/login">Login</a>
      </div>
    </form>
  </div>

  <script src="/js/signup.js"></script>
</body>
</html>
