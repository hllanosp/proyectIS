$( document ).ready(function() {
    
	var app_id = '149333848735526';
	var scopes = 'email, user_friends, public_profile';

	var btn_login = "<a id = 'login' class='btn btn-block btn-social btn-facebook'>"+
                  "<i class='fa fa-facebook'></i> Sign in with facebook"+
                  "</a>";

	var div_session = "<div id='facebook-session'>"+
					  "<strong></strong>"+
					  "<img>"+
					  "<a href='#' id='logout' class='btn btn-danger'>Cerrar sesión</a>"+
					  "</div>";

	window.fbAsyncInit = function() {

	  	FB.init({
	    	appId      : app_id,
	    	status     : true,
	    	cookie     : true,
	    	xfbml      : true,
	    	version    : 'v2.4'
	  	});


	  	FB.getLoginStatus(function(response) {
	    	statusChangeCallback(response, function() {});
	  	});
  	};

  	var statusChangeCallback = function(response, callback) {
  		console.log(response);

    	if (response.status === 'connected') {
      		getFacebookData();
    	} else {
     		callback(false);
    	}
  	}

  	var checkLoginState = function(callback) {
    	FB.getLoginStatus(function(response) {
      		callback(response);
    	});
  	}

  	var getFacebookData =  function() {
  		FB.api('/me', function(response) {
	  		$('#login').after(div_session);
	  		$('#login').remove();
	  		// $('#facebook-session strong').text("Bienvenido: "+response.name);
	  		// $('#facebook-session img').attr('src','http://graph.facebook.com/'+response.id+'/picture?type=small');
	  	});
  	}

  	var facebookLogin = function() {
  		checkLoginState(function(data) {
  			if (data.status !== 'connected') {
  				FB.login(function(response) {
  					if (response.status === 'connected')
                $.ajax({
                    type: "POST",
                    url: "login/login_submit.php",
                    data: { "usuario_ID" :  response.id },
                    success: function(data){
                         alert("creando variable de sesion");
                         window.location.reload(); 
                      }
                 });
               

  						getFacebookData();
  				}, {scope: scopes});
  			}
  		})
  	}

  	var facebookLogout = function() {
  		checkLoginState(function(data) {
  			if (data.status === 'connected') {
				FB.logout(function(response) {
					$('#facebook-session').before(btn_login);
					$('#facebook-session').remove();
				})
			}
  		})

  	}



  	$(document).on('click', '#login', function(e) {
  		e.preventDefault();
  		facebookLogin();
  	})

  	$(document).on('click', '#logout', function(e) {
  		e.preventDefault();

  		if (confirm("¿Está seguro?"))
  			facebookLogout();
  		else
  			return false;
  	})

})
