<?php $v->layout('_theme'); ?>

<div class="bg-success d-flex align-items-center" style="height: 100vh;">
    <div class="text-center text-light container-fluid">
        <h2>Bem vindo ao AgroTips, a rede social para pequenos agricultores baseado no Objetivo de Desenvolvimento Sustentável da ONU</h2>
        <p class="text-white-50 fw-italic">"2.3 Até 2030, dobrar a produtividade agrícola e a renda dos pequenos produtores de alimentos, particularmente das mulheres, povos indígenas, agricultores familiares, pastores e pescadores, inclusive por meio de acesso seguro e igual à terra, outros recursos produtivos e insumos, conhecimento, serviços financeiros, mercados e oportunidades de agregação de valor e de emprego não agrícola"</p>
    </div>

    <div class="container bg-light rounded shadow m-4">
        <form enctype="multipart/form-data" action="<?= url('functions/create-user') ?>" method="post">
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