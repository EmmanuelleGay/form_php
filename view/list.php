<?php

?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud en php</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-12">
                <h2>Crud en Php</h2>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-12">
                <a href="controller.php?action=edit" class="btn btn-success mb-2">Add User</a>
                <table class="table table-responsive-sm table-striped table-bordered">
                    <thead class="thead-dark">
                        <th>Name</th>
                        <th>Firstname</th>
                        <th>Birth Date</th>
                        <th>Tel</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>job</th>
                        <th>Url</th>
                        <th colspan="3">Edition</th>
                    </thead>
                    <tbody>
                        <?php
                        $userList = UserDao::findAll();
                        foreach ($userList as $user) { //on cree les lignes du tableau avec chaque valeur retournée
                            $data = $user->getProperties();
                            
                           unset($data['id']);
                           
                            echo '<tr>';
                            foreach ($data as $value) {
                                echo "<td>{$value}</td>";
                               
                            }
                            echo "<td class='table-primary'><a class='btn' href='controller.php?id={$user->id}&action=read'>Read</a></td>"; // un autre td pour le bouton d'edition
                            echo "<td class='table-success'><a class='btn' href='controller.php?id={$user->id}&action=edit'>Edit</a></td>"; // un autre td pour le bouton d'update
                            echo "<td class='table-danger'><a class='btn' href='controller.php?id={$user->id}&action=delete'>Delete</a></td>"; // un autre td pour le bouton de suppression

                            echo '</tr>';
                        }
                        Database::disconnect(); //on se deconnecte de la base
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>