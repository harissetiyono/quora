<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
  <script src="<?= base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
  <title>Quora - Tempat berbagi pengetahuan dan memahami dunia lebih baik</title>
</head>
<body>
<style type="text/css">
body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-color: rgb(255,255,255);
    background-image: url('http://qsf.fs.quoracdn.net/-3-images.home.illo_1920.png-26-5ac607d989ef8067.png');
}

.card-container.card {
    max-width: 650px;
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #FFFFFF;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: rgb(104, 145, 162);

    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(12, 97, 33);
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}
</style>
  
<main role="main" class="container">

<div class="card card-container">
    <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
    <img class="rounded mx-auto d-block" src="http://qsf.fs.quoracdn.net/-3-images.logo.wordmark_default.svg-26-bfa6b94bc0d6af2e.svg" />
    <br><p class="h6 text-center">Tempat berbagi pengetahuan dan memahami dunia lebih baik</p><br>
    <?php if ($this->session->userdata('message') != null): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $this->session->userdata('message'); ?>
      </div>
    <?php endif ?>
    <div class="row">
    <div class="col">
      <form action="<?=site_url('bisnis/store_member')?>" method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nama Depan</label>
            <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Nama Belakang</label>
            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang">
          </div>
        </div>
<!--         <div class="form-group">
          <label for="inputAddress">Telepon</label>
          <input type="number" class="form-control" name="telepon" placeholder="08523456789">
        </div> -->
        <div class="form-group">
          <label for="inputAddress2">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Password</label>
          <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin"">Daftar</button>
      </form>
    </div>
    <div class="col">
      <label for="inputEmail4">Masuk</label>
      <form class="form-signin" action="<?=site_url('bisnis/login')?>" method="POST">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div id="remember" class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Masuk</button>
      </form><!-- /form -->
      <a href="#" class="forgot-password">
          Forgot the password?
      </a>
    </div>
  </div>
</div><!-- /card-container -->