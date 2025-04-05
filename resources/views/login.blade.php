<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Login & Register Page</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Montserrat', sans-serif;
    }

    body {
      background-color: rgba(0, 0, 0, 0.795);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      border-radius: 30px;
      box-shadow: 0 5px 15px rgba(255, 255, 255, 0.35);
      position: relative;
      overflow: hidden;
      width: 768px;
      max-width: 100%;
      min-height: 480px;
    }

    .container p {
      font-size: 14px;
      line-height: 20px;
      letter-spacing: 0.3px;
      margin: 20px 0;
    }

    .container span {
      font-size: 12px;
    }

    .container a {
      color: #333;
      font-size: 13px;
      text-decoration: none;
      margin: 15px 0 10px;
    }

    .container button {
      background-color: rgb(249, 106, 1);
      color: #fff;
      font-size: 12px;
      padding: 10px 45px;
      border: 1px solid transparent;
      border-radius: 8px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      margin-top: 10px;
      cursor: pointer;
    }

    .container button.hidden {
      background-color: transparent;
      border-color: #fff;
    }

    .container form {
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      height: 100%;
    }

    .container input {
      background-color: #eee;
      border: none;
      margin: 8px 0;
      padding: 10px 15px;
      font-size: 13px;
      border-radius: 8px;
      width: 100%;
      outline: none;
    }

    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }

    .sign-in {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .container.active .sign-in {
      transform: translateX(100%);
    }

    .sign-up {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .container.active .sign-up {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: move 0.6s;
    }

    @keyframes move {

      0%,
      49.99% {
        opacity: 0;
        z-index: 1;
      }

      50%,
      100% {
        opacity: 1;
        z-index: 5;
      }
    }

    .toggle-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: all 0.6s ease-in-out;
      border-radius: 20px;
      z-index: 1000;
    }

    .container.active .toggle-container {
      transform: translateX(-100%);
    }

    .toggle {
      background-color: rgba(0, 0, 0, 0.952);
      height: 100%;
      color: #fff;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: all 0.6s ease-in-out;
    }

    .container.active .toggle {
      transform: translateX(50%);
    }

    .toggle-panel {
      position: absolute;
      width: 50%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 30px;
      text-align: center;
      top: 0;
      transform: translateX(0);
      transition: all 0.6s ease-in-out;
    }

    .toggle-left {
      transform: translateX(-200%);
    }

    .container.active .toggle-left {
      transform: translateX(0);
    }

    .toggle-right {
      right: 0;
      transform: translateX(0);
    }
  </style>
</head>

<body>

  <div class="container" id="container">
    <!-- Sign Up Form -->
    <div class="form-container sign-up">
      <form action="/register" method="POST">
        <h1>Create Account</h1>
        <span>Register with E-mail</span>

        <!-- Display Success or Error Messages -->
        @if(session('success'))
        <p style="background-color: green; color: green; padding: 14px; border-radius: 10px;">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
        <div style="background-color: rgb(252, 15, 3, 0.2); padding: 14px; border-radius: 10px;">
          <ul>
            @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Enter E-mail" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Enter Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <input type="hidden" value="customer" name="role">
        <button type="submit">Sign Up</button>
      </form>
    </div>

    <!-- Sign In Form -->
    <div class="form-container sign-in">
      <form action="/login" method="POST">
        <h1>Sign In</h1>
        <span>Login With Email & Password</span>

        <!-- Display Success or Error Messages -->
        @if(session('success'))
        <p style="background-color: green; color: green; padding: 14px; border-radius: 10px;">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
        <div style="background-color: rgb(252, 15, 3, 0.2); padding: 14px; border-radius: 10px;">
          <ul>
            @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @csrf
        <input type="email" name="email" placeholder="Enter E-mail" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <a href="#">Forgot Password?</a>
        <button type="submit">Sign In</button>
      </form>
    </div>

    <!-- Toggle Buttons -->
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <a href="/"><img src="{{ asset('shop/images/logo.jpg') }}" width="200" alt=""></a>
          <p>I already have an account</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <a href="/"><img src="{{ asset('shop/images/logo.jpg') }}" width="200" alt=""></a>
          <p>Don't have an account?</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    // Check local storage for active tab
    if (localStorage.getItem('activeTab') === 'signup') {
      container.classList.add("active");
    } else {
      container.classList.remove("active");
    }

    // Update active tab on button click
    registerBtn.addEventListener('click', () => {
      container.classList.add("active");
      localStorage.setItem('activeTab', 'signup');
    });

    loginBtn.addEventListener('click', () => {
      container.classList.remove("active");
      localStorage.setItem('activeTab', 'signin');
    });
  </script>
</body>

</html>