
<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jun 2020 09:56:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">
    <!-- Pace style -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/pace/pace.min.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Abus</b>v.0.0.1</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Pendaftaran User Baru</p>

    <form action="{{ route('register') }}" method="post">
        @csrf
      <div class="form-group @error('name') has-error @enderror">
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autocomplete="name" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')
            <span class="help-block" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group @error('email') has-error @enderror">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
            <span class="help-block" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group @error('username') has-error @enderror">
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('username')
            <span class="help-block" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      {{--JENIS KELAMIN--}}

      <div class="form-group">
        <label for="jenis_kelamin">
            <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-Laki
            <input type="radio" name="jenis_kelamin" value="Perempuan" > Perempuan
        </label>
        @error('jenis_kelamin')
            <span class="help-block" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

      <div class="form-group @error('no_hp') has-error @enderror">
        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="No. Handphone">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        @error('no_hp')
            <span class="help-block" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group @error('password') has-error @enderror">
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
            <span class="help-block" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Saya Setuju dengan <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{-- <div class="social-auth-links text-center">
      <p>- ATAU -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> --}}

    <a href="{{ route('login') }}" class="text-center">Sudah Punya Akun</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<!-- PACE -->
<script src="{{ asset('adminlte/bower_components/PACE/pace.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jun 2020 09:56:23 GMT -->
</html>
