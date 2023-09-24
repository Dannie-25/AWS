<?php
if (isset($_GET["id"])){
    $item = "id";
    $valor = $_GET["id"];

    $usuario = ControladorFormularios::ctrSeleccionarRegistros($item,
    $valor);

    echo '<pre>'; print_r($usuarios); echo '</pre>';
}
?>


<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="post">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user-injured"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="actualizarNombre">
            </div>
        </div>

        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Email" id="email" name="actualizarEmail">
            </div>
        </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="actualizarPassword">
            </div>
        </div>

        <?php
       
        ?>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>