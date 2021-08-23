<div class="d-flex justify-content-center mt-5">
    <div class="card mt-5 text-dark" style="width: 350px;">
        <div class="card-header text-center">
            <h1>LOGIN</h1>
        </div>
        <div class="card-body">
            {{status}}
            <form method="POST">
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="email@teste.com" required autofocus>
                </div>
                <div class="form-group my-3">
                    <label>Senha:</label>
                    <input type="password" name="senha" class="form-control" placeholder="************" required>
                </div>
                <div>
                    <a href="{{URL}}/signup">Cadastrar</a>
                    <br><br>
                    <button type="submit" class="btn btn-lg btn-danger btn-block">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</div>