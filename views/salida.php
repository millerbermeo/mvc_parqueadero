<?php
require_once "header.php";
?>

<h1>Aqui puesde dar salida a un vehiculo</h1>

<form action="?c=guardarIngreso" method="post">
    <input type="hidden" name="id_estacionamiento" value="<?php echo $_GET['id']; ?>">
    <?php echo $_GET['id'];
    ?>

    <input type="datetime-local" name="fecha_entrada" value="<?php echo $dato->fecha_entrada ?>">


    <input type="datetime-local" name="fecha_salida">
    <input type="submit" value="salida">
</form>

<?php
require_once "footer.php";
?>
