<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>User List</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-12">
                <h2>User List</h2>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-12">
                <a href="index.php?action=edit" class="btn btn-success mb-2">Add User</a>
                <table class="table table-responsive-sm table-striped table-bordered">
                    <thead class="thead-dark">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birth Date</th>
                        <th>Tel</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>job</th>
                        <th>Url</th>
                        <th colspan="3"></th>
                    </thead>
                    <tbody>
                        <?php
                        foreach (UserDao::findAll() as $user) { //on cree les lignes du tableau avec chaque valeur retournée
                            echo "<tr>
                                    <td>{$user->getFirstName()}</td>
                                    <td>{$user->getLastName()}</td>
                                    <td>{$user->getBirthDate()}</td>
                                    <td>{$user->getTel()}</td>
                                    <td>{$user->getCountry()}</td>
                                    <td>{$user->getEmail()}</td>
                                    <td>{$user->getComment()}</td>
                                    <td>{$user->getJob()}</td>
                                    <td>{$user->getUrl()}</td>
                                    <td class='table-primary'><a class='btn' href='index.php?id={$user->getId()}&action=read'>Read</a></td>
                                    <td class='table-success'><a class='btn' href='index.php?id={$user->getId()}&action=edit'>Edit</a></td>
                                    <td class='table-danger'><a class='btn' href='index.php?id={$user->getId()}&action=delete'>Delete</a></td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>