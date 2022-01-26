<?php session_start(); 
$url_base = "http://localhost/apresenta-bikes";
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://contelimabikes.000webhostapp.com/main.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
    var num1, num2, resposta;

    window.onload = function() { 
        console.log("carregou")
        
        soma;
        num1 = Math.floor(Math.random() * 10);
        num2 = Math.floor(Math.random() * 10);
        resposta = num1 + num2;

        document.getElementById("teste").innerHTML = "Qual a soma de " + num1 + " + " + num2 + "?";
    }

    function soma() {
        console.log("carrrgou soma");
        num1 = Math.floor(Math.random() * 10);
        num2 = Math.floor(Math.random() * 10);
        resposta = num1 + num2;
        console.log("num1 " + num1);
        console.log("num2 " + num2);

        document.getElementById("teste").innerHTML = "Qual a soma de " + num1 + " + " + num2 + "?";
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
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>

    <div class="d-grid gap-0 col-10 col-sm-6 mx-auto">

        <h2 style='text-align:center; font-family: Copperplate Gothic, Helvetica, sans-serif; 
        margin:30px 0px 20px'>CADASTRAR NOVO USUÁRIO</h2>
        <form method="post" action="login.php">
            
                <div class="form-floating mb-0">
                    <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="NOME">
                    <label>Nome</label><br>
                </div>

                <div class="form-floating mb-0">
                    <input type="text" name="telefone" class="form-control" id="floatingInput" placeholder="TELEFONE">
                    <label>Telefone</label><br>
                </div>
                <div class="form-floating mb-0">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="CRIE SEU USUARIO">
                    <label>Crie seu usuário</label><br>
                </div>
                <div class="form-floating mb-0">
                    <input type="password" name="senha" class="form-control" id="floatingInput" placeholder="CRIE SUA SENHA">
                    <label>Crie sua senha</label><br>
                </div>

                <button type="submit" id="tip" class="btn btn-outline-dark" style="display:none;">CADASTRAR</button>
                <input type="hidden" name="novoUsuario" value="criaUsuario">
        </form>
                <div class="d-grid col- justify-content-center">
                    <p id="teste" style="text-align:center"></p>
                    <input id="valida" type="text" style="margin-bottom:15px"/>
                    <input type="submit" value="Enviar" class="btn btn-outline-secondary" onclick="calcula()"/>    
                </div>
            </div>
    </div>

    <br>
    <?php include "../footer.php"; ?>
    <br><br><br>
</body>