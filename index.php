  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LOGIN</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
  </head>
  <body>
  <form action="proses_login.php" method="POST">
    <h1>Silakan Login</h1>
    <div class="inset">
    <p>
      <label for="email">Username</label>
      <input type="text" name="username" id="email">
    </p>
    <p>
      <label for="password">PASSWORD</label>
      <input type="password" name="password" id="password">
    </p>
    <p>
      <div class="form-group">
                <label>Sebagai:</label>
                <select  name="level" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
                  <option value="siswa">Siswa</option>
                </select>
              </div>
    </p>
    </div>
    <p class="p-container">
      <input type="submit" name="go" id="go" value="MASUK">
    </p>
  </form>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>

