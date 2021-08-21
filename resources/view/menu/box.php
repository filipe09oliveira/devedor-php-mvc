<?php
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="{{URL}}/home" class="navbar-brand">PHP-MVC</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                {{links}}
            </ul>

            <div class="d-flex justify-content-end" style="width: 100%">

                <a href="{{URL}}/logout"><button type="button" class="btn btn-primary">SAIR</button></a>
            </div>
        </div>
    </div>
</nav>
