<?php
include 'db.php';


$cont_id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;


$sql = "DELETE FROM `contact` WHERE id='" . $cont_id . "'";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location:admin.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
