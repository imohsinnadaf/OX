<?php
include('includes/config.php');

if(isset($_GET['pid']) && is_numeric($_GET['pid'])) {
    $pid = $_GET['pid'];

    // Delete the package from the database
    $sql = "DELETE FROM TblTourPackages WHERE PackageId = :pid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_INT);
    $query->execute();

    // Redirect to the page after deletion
    header('Location: manage-packages.php');
    exit();
} else {
    // Redirect if the package ID is not provided or not numeric
    header('Location: manage-packages.php');
    exit();
}
?>
