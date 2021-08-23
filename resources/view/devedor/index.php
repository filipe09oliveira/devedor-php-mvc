<?php
?>

<?php
?>

<a href="{{URL}}/devedor/create">
    <button type="button" class="btn btn-success">CADASTRAR</button>
</a>
{{status}}
<div class="card mt-3">
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Titulo</th>
                <th>Valor</th>
                <th>Data de vencimento</th>
                <th style="width: 200px; text-align: center">Ação</th>
            </tr>
            </thead>
            <tbody>
            {{itens}}
            </tbody>
        </table>
    </div>
</div>


