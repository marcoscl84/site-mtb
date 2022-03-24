<head>
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