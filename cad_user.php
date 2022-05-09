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
            <form enctype="multipart/form-data" action="func_cad_user.php" method="post">
                <h2 class="text-center my-3">Insira seus dados para se cadastrar em nossa plataforma</h2>

                <div id="input" class="form-floating mb-3">
                    <input type="text" name="name" id="name" placeholder="Nome completo" autocomplete="on" class="form-control" required>
                    <label for="name" class="form-label">Nome completo</label>
                </div>

                <div id="select" class="mb-3">
                    <select class="form-select" name="category" id="category">
                        <option selected required>Indique sua categoria</option>
                        <option value="1">Pequeno agricultor</option>
                        <option value="2">Pequeno produtor de alimentos</option>
                        <option value="3">Apoiador (pessoas interessadas em ajudar os agricultores e produtores)</option>
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" id="email" placeholder="Insira seu email" autocomplete="on" class="form-control" required>
                    <label for="email" class="form-label">Insira seu email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password" placeholder="Escolha uma senha" autocomplete="on" class="form-control" required>
                    <label for="password" class="form-label">Escolha uma senha</label>
                </div>

                <div class="mb-3">
                    <label for="profileImg" class="form-label">Escolha uma foto de perfil</label>
                    <input type="file" name="img" id="img" autocomplete="on" class="form-control">
                </div> 

                <div class="d-flex justify-content-center m-3" role="group">
                    <button type="submit" class="btn btn-success m-2">Cadastrar</button>
                    <button type="reset" class="btn btn-danger m-2">Apagar</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>