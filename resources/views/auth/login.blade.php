<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="https://img.icons8.com/ios-filled/50/000000/book.png" type="image/png" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>UnandPath | Login</title>
  <link rel="stylesheet" href="/css/login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>

    {{-- Form login Laravel --}}
    <form id="login-form" method="POST" novalidate>
      @csrf

      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" id="email" name="email" placeholder="Email" required />
      </div>
      
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="Password" required />
      </div>

      <button type="submit">Login</button>

      <div class="signup-link">
        Belum Punya Akun? <a href="/signup">Sign Up</a>
      </div>

      {{-- Error dari Laravel (fallback) --}}
      @if ($errors->any())
        <p id="error-message" style="color: red;">
          {{ $errors->first() }}
        </p>
      @else
        <p id="error-message" style="color: red; display: none;"></p>
      @endif
    </form>
  </div>

  <script src="/js/login.js"></script>
</body>
</html>
