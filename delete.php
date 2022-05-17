<?php

include("model.php");

$model = new Model();

$id = $_REQUEST['id'];
$delete = $model->delete($id);

if ($delete) {
?>
    <script>
        alert("User deleted successfully")
    </script>
    <script>
        window.location.href = "records.php";
    </script>
<?php
} else {
?>
    <script>
        alert("User not deleted")
    </script>
    <script>
        window.location.href = "records.php";
    </script>
<?php
}
?>