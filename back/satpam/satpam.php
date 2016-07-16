<head>

				<meta name="viewport" content="width-device-width,initial-scale=1.0">
		<link rel="stylesheet" href="   ../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/dashboard.css">



	</head>
	<style type="text/css">
	body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}</style>
<body>

    <div class="container">

      <form class="form-signin" action="secure/login-proses.php" method="post">
        <h2 class="form-signin-heading">Login </h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="username" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="login" >
      </form>

    </div>

		<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	</body>
	<hr>
	<h5 align="center"><i class="glyphicon glyphicon-copyright-mark"></i> ooary </h5>

</html>