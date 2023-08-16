<?php
require_once "header.php";
?>

<nav class="navbar navbar-dark bg-dark" style="padding-left: 25px; padding-right: 15px">
    <a class="navbar-brand">AGUACATO</a>

    <form action="?c=show" method="post" class="form-inline" style="display: flex; gap: 10px">
        <input class="form-control me-2" type="search" placeholder="Buscar por Placa" name="matricula"
               aria-label="Search">
        <input class="btn btn-outline-success" type="submit" value="Search"/>
    </form>

</nav>
<br>
<br>
<br>
<div class="form w-full d-flex gap-5 justify-content-center" >
    <form action="?c=guardarIngreso" method="post" enctype="multipart/form-data" style="width:400px">
        <div class="form-outline">
                <label class="form-label" for="formControlDefault">Nombre</label>
            <select class="form-select" aria-label="Default select example" name="user">
                <option selected>Seleccion al Propietario</option>
                <?php foreach ($this->Model->listarRegistros('usuarios') as $key) : ?>
                    <option value="<?php echo $key->id_user ?>"><?php echo $key->nombre_user ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-outline">
            <label class="form-label" for="formControlDefault">Placa</label>
            <select class="form-select" aria-label="Default select example" name="vehiculo">
                <option selected>Seleccion el Placa</option>
                <?php foreach ($this->Model->listarRegistros('vehiculos') as $key) : ?>
                    <option value="<?php echo $key->id_vehiculo ?>"><?php echo $key->placa?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-outline">
            <label class="form-label" for="formControlDefault">Ubicacion</label>
            <select class="form-select" aria-label="Default select example" name="piso">
                <option selected>Seleccion Ubicacion</option>
                <?php foreach ($this->Model->listarRegistros('ubicacion') as $key) : ?>
                    <option value="<?php echo $key->id_ubicacion ?>"><?php echo $key->piso?></option>
                <?php endforeach; ?>
            </select>
        </div>



        <div class="form-outline mt-3">
            <input type="submit" class="btn btn-primary" name="ntym" value="Guardar"/>
            <a class="btn btn-secondary" href="?c=nuevo">Registro</a>
        </div>


    </form>

    <div>

        <img style="width: 400px" src="views/fondo.jpg" alt="">
    </div>
</div>

<br>
<br>
<br>
<br>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">ID Estacionamiento</th>
        <th scope="col">Usuario ID</th>
        <th scope="col">Vehiculo ID</th>
        <th scope="col">Ubicacion ID</th>
        <th scope="col">Fecha Entrada</th>
        <th scope="col">Fecha Salida</th>
        <th scope="col">Tarifa ID</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->Model->listar() as $k) : ?>
        <tr>
            <td><?php echo $k->id_estacionamiento; ?></td>
            <td><?php echo $k->nombre_user; ?></td>
            <td><?php echo $k->placa; ?></td>
            <td><?php echo $k->piso; ?></td>
            <td><?php echo $k->fecha_entrada; ?></td>
            <td><?php echo $k->fecha_salida; ?></td>
            <td>$ <?php echo $k->tarifa; ?></td>
            <td style="display: flex; gap: 10px"><a class="btn btn-primary" href="?c=salida&id=<?php echo $k->id_estacionamiento?>">salida</a><a class="btn btn-danger" href="?c=eliminar&id=<?php echo $k->id_estacionamiento?>">Eliminar</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




<?php
require_once "footer.php";
?>
