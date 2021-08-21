<?php
?>

<div class="d-flex justify-content-center mt-5">
    <div class="card mt-5 text-dark" style="width: 450px;">
        <div class="card-header text-center">
            <h1>CADASTRAR</h1>
        </div>
        <div class="card-body">
            {{status}}
            <form method="POST">
                <div class="form-group my-3">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" required autofocus>
                </div>
                <div class="form-group my-3">
                    <label>E-mail:</label>
                    <input type="email" name="email" class="form-control" required autofocus>
                </div>
                <div class="form-group my-3">
                    <label>Senha:</label>
                    <input type="password" name="senha" class="form-control" placeholder="************" required>
                </div>
                <div>
                    <a href="{{URL}}/user"></a>
                    <button type="submit" class="btn btn-lg btn-danger btn-block">Cadastrar</button>

                    <a href="{{URL}}/"><button type="button" class="btn btn-lg btn-warning btn-block">Cancelar</button></a>

                </div>
                <div>

                </div>
            </form>
        </div>
    </div>
</div>


