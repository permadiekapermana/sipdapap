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
            <form action="forgot_pass_action.php" method="post">
              <h1>Reset Password</h1>
              <div>
                <input type="text" class="form-control" name="nik" placeholder="NIK" maxlength="16" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <h4 for="date" align="left">Tanggal Lahir</h4>
                <input class="form-control" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" required="" />
              </div><br>
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

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah Punya Akun ?
                  <a href="login.php" class="to_register"> Login Disini </a>
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
