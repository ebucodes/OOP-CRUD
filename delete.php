<?php
session_start();
if (strlen($_SESSION['userID']) == "") {
    header('location:logout.php');
}
?>
<?php

include("classes/model.php");

$user = new User();

$id = $_REQUEST['id'];
$delete = $user->delete($id);

if ($delete) {
    echo '<script>alert("User deleted successfully")</script>';
    echo '<script>window.location.href = "records.php";</script>';
} else {
    echo '<script>alert("User not deleted")</script>';
    echo '<script>window.location.href = "records.php";</script>';
}
