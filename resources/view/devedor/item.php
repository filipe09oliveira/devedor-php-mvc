<?php
?>

<tr>
    <td>{{nome}}</td>
    <td>{{identificacao}}</td>
    <td>{{titulo}}</td>
    <td>{{valor}}</td>
    <td>{{data_vencimento}}</td>
    <td style="text-align: center">
        <a href="{{URL}}/devedor/edit/{{id}}"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="{{URL}}/devedor/delete/{{id}}"><button type="button" class="btn btn-danger">Deletar</button></a>
    </td>
</tr>
