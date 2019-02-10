<script type="text/javascript">

  var time;
  function inicio() { 
    time = setTimeout(function() { 
        $(document).ready(function(e) {
        alert("Sesion Caducada");
        document.location.href='../../cx/destroy_session.php';  
      });
    },5400000);//fin timeout 20 minutes
  }//fin inicio
   
  function reset() {
     //console.log('entro a la funcion global');
    clearTimeout(time);//limpia el timeout para resetear el tiempo desde cero 
    time = setTimeout(function() { 
      $(document).ready(function(e) {
        alert("Su Session ha Expirado!");
        document.location.href='../../cx/destroy_session.php';  
      });
    },5400000);//fin timeout 20 minutes
  }//fin reset

  //Funcion que cambia todo lo ingresado a mayuscula
  function letras(campo){
    campo.value=campo.value.toUpperCase();
  }

  //Funcion que validad el ingreso de solo numeros
  function ValidNum(e){
    // alert('entro a los numeros ');
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8 || tecla==0){
    //console.log('entro al if, deberia devolver un true');
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }
  
    // $('#cerrar').on('click', function(){
    //   // alert('entro al eventro');
    //   $.confirm({
    //     icon: 'fa fa-user-circle-o',
    //     theme: 'supervan',
    //     closeIcon: false,
    //     content: '¿ESTA SEGURO QUE DESEA SALIR?',
    //     animation: 'scale',
    //     type: 'orange',
    //     // escapeKey: 'buttonName',
    //     buttons: {
    //         yes: {
    //             text: 'SALIR!',
    //             btnClass: 'btn-blue',
    //             keys: ['ENTER'],
    //              action: function () {
              
    //                 localStorage.setItem('cita', null);
    //                 window.location.replace('http://192.168.0.200/issei/cx/destroy_session.php');
    //             }
    //         },
    //         specialKey: {
    //             text: 'CANCELAR',
    //             keys: ['esc'],
    //             action: function(){
    //             }
    //         },
    //     }
    //   });
    // });

    function confirmar(msj, icon, color, procedimiento){
      $.confirm({
          title: '',
          content: msj,
          icon: icon,
          animation: 'scale',
          closeAnimation: 'scale',
          theme: 'supervan',
          type: color,
          opacity: 0.5,
          buttons: {
              'ok': {
                  text: 'OK',
                  btnClass: 'btn-blue',
                  action: function () {
                      if (procedimiento.indexOf("/") > -1) {
                        window.location.replace(procedimiento);
                      }
                      else if (procedimiento.indexOf("funcion") > -1) {
                        // 'procedimiento'();
                      }
                  }
              }, 
          }
      });
    }

</script>