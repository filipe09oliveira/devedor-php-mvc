<?php
?>

<h1> Excluir depoimento </h1>
<hr>
<a href="{{URL}}/">
    <button type="button" class="btn btn-warning">Voltar</button>
</a>

<hr>

<form method="post">
    <div class="form-group">
        Você deseja realmente excluir o usuário de <b>{{nome}}</b>
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-danger"> Excluir </button>
    </div>
</form>