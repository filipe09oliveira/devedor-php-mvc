<?php
?>



<div class="card">
    <div class="card-header">
        <h4> Excluir Devedor </h4>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                Você deseja realmente excluir <b>{{nome}}</b>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-danger"> Excluir</button>
                <a href="{{URL}}/devedor">
                    <button type="button" class="btn btn-warning">Cancelar</button>
                </a>
            </div>
        </form>
    </div>
</div>
