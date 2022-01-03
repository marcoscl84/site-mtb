<head>
    
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
  <?php

include "../db-conexao/dbConnect.php";
  
  $sqlTesteUserProd = "SELECT T3.id
                        FROM usuario T3
                        INNER JOIN usuario_produto T2 
                        ON T3.id = T2.id_usuario    
                        INNER JOIN produto T1 
                        ON T1.id = T2.id_produto
                        WHERE T1.id = 2";
                $sqlTesteUserProduto = mysqli_query($conexao, $sqlTesteUserProd);
                while($row = $sqlTesteUserProduto->fetch_assoc()){
                    echo $idLogado = $row['id'];
                }

  ?>
  <!-- <a class="btn btn-danger" href="teste.php?acao=excluir" onclick="return confirm('excluir mesmo?');">Excluir</a> -->
</body>