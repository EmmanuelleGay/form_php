<?php require('util/database.php'); //on appelle notre fichier de config
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("location:index.php");
} else { //on lance la connection et la requete
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tp_crud_user where id =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $row = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-12">
                <h2>Crud en Php</h2>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-12">
                <a href="add.php" class="btn btn-success mb-2">Add User</a>
                <table class="table table-responsive-sm table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td><?=$row['firstname']?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><?=$row['name']?></td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td><?=$row['birthDate']?></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td><?=$row['tel']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$row['email']?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?=$row['country']?></td>
                        </tr>
                        <tr>
                            <td>Comment</td>
                            <td><?=$row['comment']?></td>
                        </tr>
                        <tr>
                            <td>Job</td>
                            <td><?=$row['job']?></td>
                        </tr>
                        <tr>
                            <td>Web Site</td>
                            <td><?=$row['url']?></td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn" href="index.php">Back</a>
            </div>
        </div>
    </div>
</body>

</body>

</html>