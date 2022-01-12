<?php session_start(); ?>

<head>
    <link rel="stylesheet" href="../main.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>

    <?php /* if(isset($_REQUEST['novoUser'])){  */?>
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

                    <?php if(isset($_POST['palavra'])){
                        if($_POST["palavra"] == $_SESSION["palavra"]){ ?>
                        <button type="submit" class="btn btn-outline-dark">CADASTRAR</button>
                        <input type="hidden" name="novoUsuario" value="criaUsuario">
                        <?php } else {
                            echo "<h1>Tente novamente!</h1>";
                            echo "<a href='login.php'>Retornar</a>";
                        }
                    } ?>
            </form>
                    <div class="d-grid col- justify-content-center">
                        <div class="d-grid col- justify-content-center" style="margin-bottom:10px;">
                            <img src="captcha.php?l=150&a=50&tf=20&ql=5">
                        </div>
                        <form action="novo-usuario.php" name="form" method="post">
                            <input type="text" name="palavra"  />
                            <input type="submit" value="Validar Captcha" />
                        </form>
                    </div>
                </div>
        </div>
    <?php /* } */ ?>

    <br>
    <?php include "../footer.php"; ?>
</body>