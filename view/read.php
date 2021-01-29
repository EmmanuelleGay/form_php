
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
                <a href="controller.php?action=edit" class="btn btn-success mb-2">Add User</a>
                <table class="table table-responsive-sm table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td><?=$user->firstname?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><?=$user->name?></td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td><?=$user->birthDate?></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td><?=$user->tel?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$user->email?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?=$user->country?></td>
                        </tr>
                        <tr>
                            <td>Comment</td>
                            <td><?=$user->comment?></td>
                        </tr>
                        <tr>
                            <td>Job</td>
                            <td><?=$user->job?></td>
                        </tr>
                        <tr>
                            <td>Web Site</td>
                            <td><?=$user->url?></td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn" href="controller.php">Back</a>
            </div>
        </div>
    </div>
</body>

</body>

</html>