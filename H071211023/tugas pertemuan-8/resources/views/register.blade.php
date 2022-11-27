<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="stylesheet" href="style/style.css" media="screen" title="no title" charset="utf-8">
</head>

<body>

  <div class="login-page">
    <div class="form">
      <form class="register-form" action="/register" method="post">
        @csrf
        <!--  -->
        <p class="login-text" style="font-size:30px; font-weight: 800;">Register</p>
        <input type="text" name="name" placeholder="nama" required />
        <input type="email" name="email" placeholder="email address" required />
        <input type="password" name="password" placeholder="password" required />
        <button type="submit" name="kirim"><b>create</b></button>
        <p class="message">Already registered? <a href="/login">Sign In</a></p>

      </form>
    </div>
  </div>

</body>

</html>