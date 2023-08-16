<?php
require_once "header.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Aquí puedes dar salida a un vehículo</h1>
                </div>
                <div class="card-body">
                    <form action="?c=guardarIngreso" method="post">
                        <input type="hidden" name="id_estacionamiento" value="<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="fecha_entrada">Fecha de Entrada:</label>
                            <input type="datetime-local" id="fecha_entrada" name="fecha_entrada" value="<?php echo $dato->fecha_entrada ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="fecha_salida">Fecha de Salida:</label>
                            <input type="datetime-local" id="fecha_salida" name="fecha_salida" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Dar Salida</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once "footer.php";
?>
