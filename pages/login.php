<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIPDAPAP | Login Page</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.gif">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="reset_pass"></a>


      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="cek_login.php" method="post">
              <h1>Login SIPDAPAP</h1>
              <div>
                <input type="text" name = "username" class="form-control" placeholder="Masukkan Username Anda" required="" />
              </div>
              <div>
                <input type="password" name = "password" class="form-control" placeholder="Masukkan Password Anda" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Login</button>
                <a class="#reset_pass" href="forgot_pass.php">Lupa Password Anda ?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Pengguna Baru ?
                  <a href="#signup" class="to_register"> Buat Akun </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  &copy; 2019 SIPDAPAP - Universitas Muhammadiyah Cirebon <br> <a href="#">Permadi Eka Permana</a>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="register_action.php" method="POST">
              <h1>Buat Akun</h1>
              <div>
                <input type="text" class="form-control" name="nik" placeholder="NIK" maxlength="16" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required="" />
              </div>
              <div>
                <img src="captcha.php" alt="gambar" />
              </div> <br>
              <div>
                <input type="captcha" class="form-control" name="captcha" placeholder="Masukkan Captcha" required="" />
              </div> <br>
              <div>
                <button type="submit" href="#" class="btn btn-default submit">Submit</button>
              </div>
              <div><div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah Punya Akun ?
                  <a href="#signin" class="to_register"> Login Disini </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  &copy; 2019 SIPDAPAP - Universitas Muhammadiyah Cirebon <br> <a href="#">Permadi Eka Permana</a>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>

  </body>
</html>
