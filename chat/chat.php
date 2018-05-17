<?php
session_start();
$usu=$_SESSION["usuario"];
include "db.php";
///consultamos a la base
    $consult = "SELECT COUNT(id) FROM chat";
$arrayss = $conexion->query($consult);
while ($row = $arrayss->fetch_row()):


if ($row[0]!=$_SESSION["mensa"]){
    echo '<audio autoplay> <source src="beep.mp3" type="audio/mpeg"></audio>';
}
    $_SESSION["mensa"]=$row[0];

endwhile;

$consulta = "SELECT * FROM chat ORDER BY id DESC LIMIT 7";

$ejecutar = $conexion->query($consulta);
while($fila = $ejecutar->fetch_array()) :

    if ($fila["nombre"]==$usu){
        $class="msg_b";
    }else{
        $class="msg_a";
    }
    ?>
    <span style="color: #1C62C4;"><?php echo $fila['nombre']; ?></span>
    <div id="<?php echo $fila["id"]; ?>" class="<?php echo $class; ?>">

        <?php echo $fila['mensaje']; ?>
        <span style="float: right; font-size: 10px"><?php echo formatearFecha($fila['fecha']); ?></span>
    </div>

<?php endwhile; ?>
<span style="color: #1C62C4;"><?php echo $fila['nombre']; ?></span>
