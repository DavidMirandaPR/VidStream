<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
  <body>
    <form class="regForm" action="/login" method="post">
      <div class="email">
        E-Mail
      </div>
      <input type="email" name="email" value="david.mirandapr@gmail.com">
      <div class="password">
        Password
      </div>
      <input type="password" name="password" value="randompassword">
      <div class="submit">
        <input type="submit" name="submitBtn" value="submit">
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
  </body>
</html>
