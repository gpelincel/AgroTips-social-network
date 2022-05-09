<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/CSS.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>AgroTips</title>
</head>

<body>
    <div class="bg-success d-flex align-items-center" style="height: 100vh;">
        <div class="text-center text-light container-fluid">
            <h2>Bem vindo ao AgroTips, a rede social para pequenos agricultores baseado no Objetivo de Desenvolvimento Sustentável da ONU</h2>  
            <p class="text-white-50 fw-italic">"2.3 Até 2030, dobrar a produtividade agrícola e a renda dos pequenos produtores de alimentos, particularmente das mulheres, povos indígenas, agricultores familiares, pastores e pescadores, inclusive por meio de acesso seguro e igual à terra, outros recursos produtivos e insumos, conhecimento, serviços financeiros, mercados e oportunidades de agregação de valor e de emprego não agrícola"</p>
        </div>

        <div class="container bg-light rounded shadow m-4">
            <form action="func_login.php" method="post">
                <h2 class="text-center my-3">Faça login ou registre-se gratuitamente!</h2>
                <div id="input" class="form-floating mb-3">
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" class="form-control">
                    <label for="email" class="form-label">Email</label>
                </div>

                <div id="input" class="form-floating mb-3">
                    <input type="password" name="password" id="password" placeholder="Senha" autocomplete="off" class="form-control">
                    <label for="password" class="form-label">Senha</label>
                </div>

                <div class="d-flex justify-content-center" role="group">
                    <button type="submit" class="btn btn-success m-2">Logar</button>
                    <button type="reset" class="btn btn-danger m-2">Apagar</button>
                </div>

                <div class="text-center">
                    <a href="cad_user.php">Não é registrado? <strong>Clique aqui!</strong></p>
                </div>
            </form>
        </div>

    </div>
</body>

</html>