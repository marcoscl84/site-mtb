<?php $url_base = "http://localhost/apresenta-bikes"; ?>

<style type="text/css">
    .corpoPag{
        margin-top: 290px;
    }

    @media (min-width: 538px){
        .corpoPag{
            margin-top: 240px;
        }        
    }

    @media (min-width: 950px){
        .corpoPag{
            margin-top: 180px;
        }        
    }

    @media (min-width: 991px){
        .corpoPag{
            margin-top: 135px;
        }        
    }

    @media (min-width: 1099px){
        .corpoPag{
            margin-top: 110px;
        }        
    }

    footer .footer{
        text-align: center;
        height: fit-content;
        font-family: Arial, Helvetica, sans-serif;
        background-color: white;
        width: 100%;  
    }
</style>

<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
    <br>
    <div class="corpoPag">
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

                    
                    <div class="formulario-insercao gap-0 col-10 col-sm-4 mx-auto justify-content-center" 
                    style="padding:20px; box-shadow: 10px 10px 10px 8px #00D9A3; border-radius:10px;">
                        <div class="d-flex flex-column justify-content-center">
                            <form method="post" action="../index.php">                
                                <div class="form-floating mb-3">
                                    <input required type="text" name="username" class="form-control" 
                                    id="floatingInput" placeholder="USUARIO">
                                    <!-- <label>Usuário</label><br> -->
                                </div>

                                <div class="form-floating mb-3">
                                    <input required type="password" name="senha" class="form-control" 
                                    id="floatingInput" placeholder="SENHA">
                                    <!-- <label>Senha</label><br> -->
                                </div>
                                
                                <div class="d-grid col- text-center" style="margin-top:25px;">
                                    <button type="submit" class="btn btn-outline-dark text-wrap" name="loginButton">EFETUAR LOGIN</button>
                                    <input type="hidden" name="enviaLogin" value="logado">
                                </div>
                            </form>

                            <!-- BOTAO NOVO USUARIO -->
                            <?php if(!isset($_REQUEST['novoUser'])){ ?>
                                <div class="d-grid col- mx-auto">
                                    <form method="post" action="novo-usuario.php">
                                        <button type="submit" class="btn btn-danger text-wrap">NOVO USUÁRIO</buttom>
                                        <input type="hidden" name="novoUser" value="cadastra"> 
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div> 
                </div>
            <?php } ?>

            <br>
            <?php include "../footer.php"; ?>
            <br>
        </div>
    </div>
</body>