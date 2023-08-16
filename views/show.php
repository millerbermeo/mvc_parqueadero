<?php
require_once "header.php";
?>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Show</h1>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($dato)): ?>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>ID Estacionamiento:</strong> <?php echo $dato->id_estacionamiento; ?></li>
                                <li class="list-group-item"><strong>Nombre de Usuario:</strong> <?php echo $dato->nombre_user; ?></li>
                                <li class="list-group-item"><strong>Placa del Vehículo:</strong> <?php echo $dato->placa; ?></li>
                                <li class="list-group-item"><strong>Piso:</strong> <?php echo $dato->piso; ?></li>
                                <li class="list-group-item"><strong>Fecha de Entrada:</strong> <?php echo $dato->fecha_entrada; ?></li>
                                <li class="list-group-item"><strong>Fecha de Salida:</strong> <?php echo $dato->fecha_salida; ?></li>
                                <li class="list-group-item"><strong>Tarifa:</strong> <?php echo $dato->tarifa; ?></li>
                                <li class="list-group-item"><a href="index.php" class="btn btn-primary">Atras</a></li>
                            </ul>
                        <?php else : ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">No hay datos disponibles.</li>
                                <li class="list-group-item"><a href="index.php" class="btn btn-primary">Atras</a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once "footer.php";
?>