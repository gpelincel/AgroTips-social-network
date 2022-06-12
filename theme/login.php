<?php $v->layout("_theme") ?>

<div class="bg-success d-flex align-items-center" style="height: 100vh;">
        <div class="text-center text-light container-fluid">
            <h2>Bem vindo ao AgroTips, a rede social para pequenos agricultores baseado no Objetivo de Desenvolvimento Sustentável da ONU</h2>  
            <p class="text-white-50 fw-italic">"2.3 Até 2030, dobrar a produtividade agrícola e a renda dos pequenos produtores de alimentos, particularmente das mulheres, povos indígenas, agricultores familiares, pastores e pescadores, inclusive por meio de acesso seguro e igual à terra, outros recursos produtivos e insumos, conhecimento, serviços financeiros, mercados e oportunidades de agregação de valor e de emprego não agrícola"</p>
        </div>

        <div class="container bg-light rounded shadow m-4">
            <form action="<?= url("functions/login") ?>" method="post">
                <h2 class="text-center my-3">Faça login ou registre-se gratuitamente!</h2>
                <div id="input" class="form-floating mb-3">
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" class="form-control" required>
                    <label for="email" class="form-label">Email</label>
                </div>

                <div id="input" class="form-floating mb-3">
                    <input type="password" name="password" id="password" placeholder="Senha" autocomplete="off" class="form-control" required>
                    <label for="password" class="form-label">Senha</label>
                </div>

                <div class="d-flex justify-content-center" role="group">
                    <button type="submit" class="btn btn-success m-2">Logar</button>
                    <button type="reset" class="btn btn-danger m-2">Apagar</button>
                </div>

                <div class="text-center">
                    <a href="<?= url("cadastro") ?>">Não é registrado? <strong>Clique aqui!</strong></p>
                </div>
            </form>
        </div>

</div>