<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistema JapaCar | </title>

  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../assets/css/font-awesome/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../assets/css/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../assets/css/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <?php 
          echo form_open('autentica');
          ?>
          <h1>Sistema JapaCar</h1>
          <div>
            <input type="text" id="login" name="login" class="form-control" placeholder="Username" required="" />
          </div>
          <div>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="Password" required="" />
          </div>
          <div>
            <button class="btn btn-default submit" type="submit">Entrar</button>
            <a class="reset_pass" href="#">Esqueceu a senha?</a>
          </div>

          <div class="clearfix"></div>
          <?php echo form_close(); ?>
        </section>
      </div>
    </div>
  </div>
</body>
</html>
