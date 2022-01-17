<head>
    
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <!-- criação captcha -->
  
  <script> 
    var num1, num2, resposta;

    window.onload = function() { 
      console.log("carregou")
      
      soma;
      num1 = Math.floor(Math.random() * 10);
      num2 = Math.floor(Math.random() * 10);
      resposta = num1 + num2;

      document.getElementById("teste").innerHTML = "qual a soma de " + num1 + " + " + num2 + "?";
    }

    function soma() {
      console.log("carrrgou soma");
      num1 = Math.floor(Math.random() * 10);
      num2 = Math.floor(Math.random() * 10);
      resposta = num1 + num2;
      console.log("num1 " + num1);
      console.log("num2 " + num2);

      document.getElementById("teste").innerHTML = "qual a soma de " + num1 + " + " + num2 + "?";
      console.log("resp " + resposta);
    }

    var result = resposta

    function calcula() {
      console.log(document.getElementById("valida").value)
      if (document.getElementById("valida").value != resposta) {
        soma();
      } else {
        document.getElementById("tip").style.display = 'flex'; 
      }
    }

  </script>

</head>
<body>


   <p id="teste"></p>
   <input id="valida" type="text"/>
   <input type="submit" value="Enviar" onclick="calcula()"/>
   <p id="mensagem"></p>
   <input type="text" id="tip" style="display:none;"/>

  <script>
    
  </script>

</body>