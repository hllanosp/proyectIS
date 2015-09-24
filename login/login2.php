<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="login/main.js"></script>
</head>
<body>
	<div class="row-fluid">
  <div class="col-md-12">
    Login via
    <div class="social-buttons">
      <!-- <a class="btn btn-block btn-social btn-google">

        <i class="fa fa-google"></i> Sign in with google
      </a> -->
      <span id="signinButton">
  <span
    class="g-signin"
    data-callback="signinCallback"
    data-clientid="412190194335-1nd1gmaohl98gj51v5hvesi7tns1qgd8.apps.googleusercontent.com"
    data-cookiepolicy="single_host_origin"
    data-requestvisibleactions="http://schemas.google.com/AddActivity"
    data-scope="https://www.googleapis.com/auth/plus.login">
  </span>
</span>

      <a id = "login" class="btn btn-block btn-social btn-facebook">
        <i class="fa fa-facebook"></i> Sign in with facebook
      </a>
    <!--   <a class="btn btn-block btn-social btn-facebook">
        <i class="fa fa-facebook"></i> Sign in with Facebook
      </a> -->
    </div>
           
                    or
     <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
        <div class="form-group">
           <label class="sr-only" for="exampleInputEmail2">Email address</label>
           <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
        </div>
        <div class="form-group">
           <label class="sr-only" for="exampleInputPassword2">Password</label>
           <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                 <div class="help-block text-right"><a href="">Forget the password ?</a></div>
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </div>
        <div class="checkbox">
           <label>
           <input type="checkbox"> keep me logged-in
           </label>
        </div>
     </form>
  </div>
  <!-- <div class="bottom text-center">
    New here ? <a href="#"><b>Join Us</b></a>
  </div> -->
</div>

    <!-- Coloca este JavaScript asíncrono justo delante de la etiqueta </body> -->
    <script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();


     function signinCallback(authResult) {
  if (authResult['access_token']) {
    // alert('autenticado correctamente');
    // Autorizado correctamente
    // Oculta el botón de inicio de sesión ahora que el usuario está autorizado, por ejemplo:
    $me = $plus->people->get('me');
    print "ID: {$me['id']}\n";
    print "Display Name: {$me['displayName']}\n";
    print "Image Url: {$me['image']['url']}\n";
    print "Url: {$me['url']}\n";
    document.getElementById('signinButton').setAttribute('style', 'display: none');
  } else if (authResult['error']) {
    // Se ha producido un error.
    // Posibles códigos de error:
    //   "access_denied": el usuario ha denegado el acceso a la aplicación.
    //   "immediate_failed": no se ha podido dar acceso al usuario de forma automática.
    console.log('There was an error: ' + authResult['error']);
  }
}
    </script>



	<script>
	// Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
	 </script>
</body>
</html>
