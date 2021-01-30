<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Delete a User</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Delete a User</h3>
            </div>
            <form class="form-horizontal" action="index.php?id=<?=$user->getId()?>&action=delete" method="post">
                <input type="hidden" name="id"/>
                Are you sure you want to delete "<?=$user->getFirstName()?> <?=$user->getLastName()?>"?
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn" href="index.php">No</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>