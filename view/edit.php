<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div class="container">
        <div class="row">
            <h3>Edit User</h3>
        </div>
        <form action="controller.php?id=<?= $user->id; ?>&action=edit" method="post">

            <div class="form-group">
                <label for="name">First Name</label>
                <input class="form-control" id="name" type="text" name="user[firstname]" value="<?= $user->firstname; ?>">
                <?php
                if (!$user->validatefield('firstname') & isset($_POST['user'])) : ?>
                    <span class="help-inline">Vous devez renseigner un prénom valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="firstname">Last Name</label>
                <input class="form-control" id="firstname" name="user[name]" id="firstname" type="text" placeholder="Name" value="<?= $user->name ?>">
                <?php if (!$user->validateField('name')& isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un nom valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input id="birthDate" class="form-control" type="date" name="user[birthDate]" value="<?= $user->birthDate ?>">
                <?php if (!$user->validateField('birthDate')& isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir une date valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" class="form-control" name="user[email]" type="text" placeholder="Email Address" value="<?= $user->email ?>">
                <?php if (!$user->validateField('email')& isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un email valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <labelfor="phone">Telephone</label>
                    <input class="form-control" id="phone" name="user[tel]" type="text" placeholder="Telephone" value="<?= $user->tel ?>">
                    <?php if (!$user->validateField('tel')& isset($_POST['user'])) : ?>
                        <span class="help-inline">Veuillez saisir un téléphone valide</span>
                    <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select  class="form-control" id="country" name="user[country]">
                    <option value="paris">Paris</option>
                    <option value="londres">Londres</option>
                    <option value="amsterdam">Amsterdam</option>
                </select>
                <?php if (!$user->validateField('country')& isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir une ville valide</span>
                <?php endif; ?>
            </div>

            <div class="form-group>">
                <p>Job : </p>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="user[job]" value="dev" <?php if ($user->job == "dev") echo "checked"; ?>>
                    <label class="form-check-label" for="dev">
                        Software Developer
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="user[job]" value="integrateur" <?php if ($user->job == "integrateur") echo "checked"; ?>>
                    <label class="form-check-label" for="system">
                        System Developer
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="checkbox" name="user[job]" value="reseau" <?php if ($user->job == "reseau") echo "checked"; ?>>
                    <label class="form-check-label" for="dev">
                        Network adminisatrator
                    </label>
                </div>
                <?php if (!$user->validateField('job')& isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un métier valide</span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" name="user[url]" value="<?= $user->url ?>">
                <?php if (!$user->validateField('url')& isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir une url valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" rows="4" cols="60" name="user[comment]"><?= $user->comment; ?></textarea>
                <?php if (!$user->validateField('comment')& isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un commentaire valide</span>
                <?php endif; ?>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <input type="hidden" class="btn btn-success" name="user[id]" value=<?= $user->id; ?>>
                <a class="btn" href="controller.php">Retour</a>
            </div>
        </form>
    </div>
</body>

</html>