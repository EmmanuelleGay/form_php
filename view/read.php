
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>View a User</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-12">
                <h2>View a User</h2>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-12">
                <a href="index.php?action=edit" class="btn btn-success mb-2">Add User</a>
                <table class="table table-responsive-sm table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td><?=$user->getFirstName()?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><?=$user->getLastName()?></td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td><?=$user->getBirthDate()?></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td><?=$user->getTel()?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$user->getEmail()?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?=$user->getCountry()?></td>
                        </tr>
                        <tr>
                            <td>Comment</td>
                            <td><?=$user->getComment()?></td>
                        </tr>
                        <tr>
                            <td>Job</td>
                            <td><?=$user->getJob()?></td>
                        </tr>
                        <tr>
                            <td>Web Site</td>
                            <td><?=$user->getUrl()?></td>
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