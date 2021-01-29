<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Delete a user</h3>
            </div>
            <form class="form-horizontal" action="controller.php?id=<?=$_GET['id']?>&action=delete" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                Are you sure to delete ?

                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn" href="controller.php">No</a>
                </div>

            </form>
        </div>
    </div>
    <!-- /container -->
</body>

</html>