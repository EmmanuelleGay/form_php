<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Edit User</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Edit User</h3>
        </div>
        <form action="index.php?id=<?= $user->getId() ?>&action=edit" method="post">

            <div class="form-group">
                <label for="firstName">First Name</label>
                <input class="form-control" id="firstName" type="text" name="user[firstName]" value="<?= $user->getFirstName() ?>">
                <?php
                if (!$user->validatefield('firstName') && isset($_POST['user'])) : ?>
                    <span class="help-inline">Vous devez renseigner un prénom valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input class="form-control" id="lastName" name="user[lastName]" type="text" value="<?= $user->getLastName() ?>">
                <?php if (!$user->validateField('lastName') && isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un nom valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input id="birthDate" class="form-control" type="date" name="user[birthDate]" value="<?= $user->getBirthDate() ?>">
                <?php if (!$user->validateField('birthDate') && isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir une date valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" class="form-control" name="user[email]" type="text" placeholder="Email Address" value="<?= $user->getEmail() ?>">
                <?php if (!$user->validateField('email')& isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un email valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <labelfor="phone">Telephone</label>
                    <input class="form-control" id="phone" name="user[tel]" type="text" value="<?= $user->getTel() ?>">
                    <?php if (!$user->validateField('tel') && isset($_POST['user'])) : ?>
                        <span class="help-inline">Veuillez saisir un téléphone valide</span>
                    <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input class="form-control" id="country" name="user[country]" type="text" value="<?= $user->getCountry() ?>">
                <?php if (!$user->validateField('country') && isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un pays valide</span>
                <?php endif; ?>
            </div>

            <div class="form-group>">
                <p>Job : </p>
                <div class="form-check form-check-inline">
                    <input type="radio" name="user[job]" value="dev" <?php if ($user->getJob() == "dev") echo "checked"; ?>>
                    <label class="form-check-label" for="dev">
                        Software Developer
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="user[job]" value="integrateur" <?php if ($user->getJob() == "integrateur") echo "checked"; ?>>
                    <label class="form-check-label" for="system">
                        System Developer
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="user[job]" value="reseau" <?php if ($user->getJob() == "reseau") echo "checked"; ?>>
                    <label class="form-check-label" for="dev">
                        Network administrator
                    </label>
                </div>
                <?php if (!$user->validateField('job') && isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un métier valide</span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" name="user[url]" value="<?= $user->getUrl() ?>">
                <?php if (!$user->validateField('url') && isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir une url valide</span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" rows="4" cols="60" name="user[comment]"><?= $user->getComment() ?></textarea>
                <?php if (!$user->validateField('comment') && isset($_POST['user'])) : ?>
                    <span class="help-inline">Veuillez saisir un commentaire valide</span>
                <?php endif; ?>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <input type="hidden" class="btn btn-success" name="user[id]" value=<?= $user->getId() ?>>
                <a class="btn" href="index.php">Retour</a>
            </div>
        </form>
    </div>
</body>

</html>