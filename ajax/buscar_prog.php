<?php
session_start();
error_reporting(0);
require_once('../admin/conex.php');

$inicio = $_POST['inicio'];
$fin = $_POST['fin'];

$sql = mysqli_query($conn, "SELECT DISTINCT ip, id_ot, fecha, empresa, faena
    FROM detallle_ot
    WHERE fecha BETWEEN '$inicio' AND '$fin'
    ORDER BY fecha ASC");

echo '<table width="100%" border="0" class="table table-striped responsive-font">
<tr>
    <th>EV-IP</th>
    <th>N° OT</th>
    <th>FECHA</th>
    <th>EMPRESA</th>
    <th>FAENA</th>
    <th>CANTIDAD</th>
</tr>';

$totalCantidadFilas = 0;

while($ver = mysqli_fetch_array($sql)){

    $ip = $ver['ip'];
    $id_ot = $ver['id_ot'];

    $query = mysqli_query($conn, "SELECT id FROM detallle_ot WHERE fecha BETWEEN '$inicio' AND '$fin' AND ip = '$ip' AND id_ot = '$id_ot'");
    $cantidadFilas = mysqli_num_rows($query);

    $totalCantidadFilas += $cantidadFilas;

echo '<tr>';
echo '<td>'.$ver['ip'].'</td>';
echo '<td>'.$ver['id_ot'].'</td>';
echo '<td>'.date("d-m-Y", strtotime($ver['fecha'])).'</td>';
echo '<td>'.$ver['empresa'].'</td>';
echo '<td>'.$ver['faena'].'</td>';
echo '<td>'.$cantidadFilas.'</td>';
echo '</tr>';
}
echo '</table>';

echo '<h3>TOTAL DE ORDENES DE TRABAJO: '.$totalCantidadFilas.'</h3>';
?>
