<head>
    <link rel="stylesheet" href="../main.css"/>
</head>
<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
 
    <div class="container-wout-header">
       
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
 
        // LOGIN
        if(isset($_REQUEST['loginButtom'])){
           
 
            //session_start();
        }
 
        // LOGOUT
        if(isset($_REQUEST['logoutButtom'])){
           
 
            //session_destroy();
        }
 
?>
        <div class="login-container">
 
<!-- LOGIN -->
            <?php if(!isset($_REQUEST['novoUser'])){ ?>
                <form method="post" action="classificados.php">                
                    <div class="efetua-login">
                        <label>Usuário</label>
                        <input type="text" name="username">
                        <label>Senha</label>
                        <input type="password" name="senha">
                       
                        <button type="submit">LOGIN</buttom>
                        <input type="hidden" name="enviaLogin" value="logado">
                    </div>
                </form>
            <?php } ?>
                       
<!-- BOTAO NOVO USUARIO -->
            <form method="post" action="login.php">
                <div class="botao">
                    <button type="submit">CADASTRAR NOVO USUÁRIO</buttom>
                    <input type="hidden" name="novoUser" value="cadastra">
                </div>
            </form>
       
<!-- FORMULARIO CADASTRO NOVO USUARIO -->
            <?php if(isset($_REQUEST['novoUser'])){ ?>
                <form method="post" action="login.php">
                    <div class="novo-usuario">
                        <label>Nome</label>
                        <input type="text" name="nome">
                        <label>Telefone</label>
                        <input type="text" name="telefone">
                        <label>Crie seu usuário</label>
                        <input type="text" name="username">
                        <label>Crie sua senha</label>
                        <input type="password" name="senha">
                       
                        <button type="submit">Enviar</button>
                        <input type="hidden" name="novoUsuario" value="criaUsuario">
                    </div>
                </form>
            <?php } ?>
   
            <br>
            <?php include "../footer.php"; ?>  
        </div>
    </div>
</body>