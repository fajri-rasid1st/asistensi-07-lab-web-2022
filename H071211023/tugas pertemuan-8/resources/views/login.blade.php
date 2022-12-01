<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="style/style.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="/login" method="POST">
        @csrf

        <!-- // -->

        <p class="login-text" style="font-size:30px; font-weight: 800;">Login</p>
        <input type="email" name="email" placeholder="email" required />
        <input type="password" name="password" placeholder="password" required />
        <button type="submit" name="kirim"><b>login</b></button>
        <p class="message">Not registered? <a href="/register">Create an account</a></p>
      </form>
    </div>
  </div>
</body>

</html>