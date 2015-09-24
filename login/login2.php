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
      <a class="btn btn-block btn-social btn-google">
        <i class="fa fa-google"></i> Sign in with google
      </a>
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
