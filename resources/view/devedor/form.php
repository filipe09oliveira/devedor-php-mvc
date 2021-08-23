<?php
?>

{{status}}
<div class="card mt-3">
    <div class="card-header">
        <h3 class=""> {{title}} </h3>
    </div>
    <div class="card-body">
        <form class="row g-3" method="post">

            <div class="col-md-4">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome" id="nome" value="{{nome}}" required>
            </div>

            <div class="col-md-2">
                <label>Data nascimento</label>
                <input class="form-control" type="date" name="data_nascimento" id="data_nascimento"
                       value="{{data_nascimento}}" required>
            </div>


            <div class="col-md-6">
                <label>CPF/CNPJ</label>
                <input class="form-control" name="identificacao" id="identificacao" value="{{identificacao}}" required>
            </div>

            <div class="col-md-12">
                <label>Endereço</label>
                <input class="form-control" name="endereco" id="endereco" value="{{endereco}}" required>
            </div>

            <div class="col-md-6">
                <label>Descrição</label>
                <input class="form-control" name="titulo" id="titulo" value="{{titulo}}" required>
            </div>

            <div class="col-md-4">
                <label>Valor</label>
                <input class="valor form-control" type="number" step="0.01" min="0.01" name="valor" id="valor"
                       value="{{valor}}" required>
            </div>

            <div class="col-md-2">
                <label>Data Vencimento</label>
                <input class="form-control" type="date" name="data_vencimento" id="data_vencimento"
                       value="{{data_vencimento}}" required>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success"> Enviar</button>
                <a href="{{URL}}/devedor">
                    <button type="button" class="btn btn-warning">Voltar</button>
                </a>
            </div>
        </form>
    </div>
</div>


