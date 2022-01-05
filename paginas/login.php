<head>
    <link rel="stylesheet" href="../main.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
       
<?php
 
    include "../db-conexao/dbConnect.php";
    
    // CRIA USUÁRIO OK
    if(isset($_REQUEST['novoUsuario'])){
        $testaIgual = mysqli_query($conexao, "SELECT COUNT(id) as cont FROM usuario WHERE username = '".$_REQUEST['username']."'");
        $linhaTestaIgual = mysqli_fetch_assoc($testaIgual);
        
        if($linhaTestaIgual['cont'] > 0){
            echo '<div style="border: 1px solid red; padding: 20px; font-size: 20px; text-align: center">Usuário já cadastrado</div>';
        } else {
            $novoNome = $_REQUEST['nome'];
            $novoFone = $_REQUEST['telefone'];
            $novoUser = $_REQUEST['username'];
            $novaSenha = $_REQUEST['senha'];

            $usuarioNovo = "INSERT INTO `usuario` (`nome`, `telefone`, `username`, `senha`)
            VALUES ('$novoNome', '$novoFone', '$novoUser', md5('$novaSenha'))";

            if (mysqli_query($conexao, $usuarioNovo)) {
                ?> <script> alert("Usuário criado!"); </script> <?php
            } else {
                echo "Ooops... algo deu errado ".$novoNome;
            }
        }
    }

?>
    <div class="login-container">

<!-- LOGIN -->
        <?php if(!isset($_REQUEST['novoUser'])){ ?>
            <div class="d-grid col-12">
                <h1 style='text-align:center; font-family: Copperplate Gothic, Helvetica, sans-serif; 
                margin:30px 0px 20px'>LOGIN</h1>

                
                <div class="formulario-insercao gap-0 col-4 mx-auto justify-content-center" 
                style="padding:20px; box-shadow: 10px 10px 10px 8px #00D9A3; border-radius:10px;">
                    <div class="d-flex flex-column justify-content-center">
                        <form method="post" action="../index.php">                
                            <div class="form-floating mb-0">
                                <input type="text" name="username" class="form-control" 
                                id="floatingInput" placeholder="TIPO">
                                <label>Usuário</label><br>
                            </div>

                            <div class="form-floating mb-0">
                                <input type="password" name="senha" class="form-control" 
                                id="floatingInput" placeholder="TIPO">
                                <label>Senha</label><br>
                            </div>
                        
                            <div class="d-grid col- justify-content-center" style="margin:5px;">
                                <button type="submit" class="btn btn-outline-dark text-wrap" name="loginButton">EFETUAR LOGIN</button>
                                <input type="hidden" name="enviaLogin" value="logado">
                            </div>
                        </form>

                        <!-- BOTAO NOVO USUARIO -->
                        <?php if(!isset($_REQUEST['novoUser'])){ ?>
                            <div class="d-grid col- justify-content-center">
                                <form method="post" action="login.php">
                                    <button type="submit" class="btn btn-danger text-wrap">CADASTRAR NOVO USUÁRIO</buttom>
                                    <input type="hidden" name="novoUser" value="cadastra"> 
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div> 
            </div>
        <?php } ?>
                    

    
<!-- FORMULARIO CADASTRO NOVO USUARIO -->
        <?php if(isset($_REQUEST['novoUser'])){ ?>
            <div class="d-grid gap-0 col-6 mx-auto">

                <h2 style='text-align:center; font-family: Copperplate Gothic, Helvetica, sans-serif; 
                margin:30px 0px 20px'>CADASTRAR NOVO USUÁRIO</h2>
                <form method="post" action="login.php">
                    
                        <div class="form-floating mb-0">
                            <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="TIPO">
                            <label>Nome</label><br>
                        </div>

                        <div class="form-floating mb-0">
                            <input type="text" name="telefone" class="form-control" id="floatingInput" placeholder="TIPO">
                            <label>Telefone</label><br>
                        </div>
                        <div class="form-floating mb-0">
                            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="TIPO">
                            <label>Crie seu usuário</label><br>
                        </div>
                        <div class="form-floating mb-0">
                            <input type="password" name="senha" class="form-control" id="floatingInput" placeholder="TIPO">
                            <label>Crie sua senha</label><br>
                        </div>
                    
                        <button type="submit" class="btn btn-outline-dark">CADASTRAR</button>
                        <input type="hidden" name="novoUsuario" value="criaUsuario">
                    </div>
                </form>
            </div>
        <?php } ?>

        <br>
        <?php include "../footer.php"; ?>  
    </div>
</body>