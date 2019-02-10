<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		<title>Login</title>

		<script src="http://cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
		<link href="css/login.css" rel="stylesheet" type="text/css">
		
		<script type="text/javascript">
			function letras(campo){
				campo.value=campo.value.toUpperCase();
			}
		</script>
	</head>
	<noscript>
	    <meta http-equiv="Refresh" content="0;URL=http://www.scesas.com/Super/cx/destroy_session.php">
	</noscript>

	<script type="text/javascript">
	  //Function that blocks the right click
	  document.oncontextmenu= function(){
	      return false;
	  };
	  //Function that blocks the F12 key, control and other F, except F1
	  document.onkeydown=function() { 
	    if (window.event) {
	      if((window.event.keyCode >= 117) && (window.event.keyCode <= 123)){
	        //Bloquear Backspace
	        //Bloquear Teclas Fxx (excepto F1)
	        window.event.cancelBubble = true;
	        // window.event.keyCode = 8;
	        window.event.returnValue = false;
	        return false;
	      }
	    }

	    if(event.altLeft) {
	      if((window.event.keyCode == 37) || (window.event.keyCode == 39)) {
	      //Bloquear Alt + Cursor Izq/Der.
	      return false;
	      }
	    }

	    if(event.ctrlKey) {
	      //Bloquear Ctrl
	      return false;
	    }
	    //alert(window.event.keyCode);
	    return true;
	  }
	</script>
	<body>
		<form class="login" method="post" action="controllers/ingreso_controller.php">
	    <h1 class="login-title">
	    	<img src="img/logo.png" width="100%">
	    </h1>
	    <input type="text" class="login-input" placeholder="Usuario / Empresa" onChange="letras(this)" id="usuario" name="usuario" autofocus>
	    <input type="password" id="pass" name="pass" class="login-input" placeholder="Password">
	    <input type="submit" value="Iniciar sesión" class="login-button">
	  	<p class="login-lost">
	  		<!-- <a href="modules/login/reset.php">Forgot Password?</a> -->
	  	</p>
	  </form>
	</body>
</html>
