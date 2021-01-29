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
            <h3 class="mt-5 mb-3">Add a user</h3>
        </div>
        <div class="row">
            <form method="post" action="controller.php?action=edit">

                <div class="form-group <?php echo !empty($nameError) ? 'error' : ''; ?>">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Name" value="<?php echo !empty($name) ? $name : ''; ?>">
                    <?php if (!empty($nameError)) : ?>
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    <?php endif; ?>

                </div>

                <div class="form-group <?php echo !empty($firstnameError) ? 'error' : ''; ?>">
                    <label for="firstname">firstname</label>
                    <input class="form-control" id="firstname" type="text" placeholder="Firstname" name="firstname" value="<?php echo !empty($firstname) ? $firstname : ''; ?>">
                    <?php if (!empty($firstnameError)) : ?>
                        <span class="help-inline"><?php echo $firstnameError; ?></span>
                    <?php endif; ?>
                </div>



                <div class="form-group <?php echo !empty($birthDateError) ? 'error' : ''; ?>">
                    <label for="birthDate">Birth Date</label>
                    <input id="birthDate" class="form-control" type="date" name="birthDate" value="<?php echo !empty($birthDate) ? $birthDate : ''; ?>">
                    <?php if (!empty($birthDateError)) : ?>
                        <span class="help-inline"><?php echo $birthDateError; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                    <label for="email">Email Address</label>
                    <input id="email" class="form-control" name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email) ? $email : ''; ?>">
                    <?php if (!empty($emailError)) : ?>
                        <span class="help-inline"><?php echo $emailError; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo !empty($telError) ? 'error' : ''; ?>">
                    <label for="phone">Telephone</label>
                    <input class="form-control" id="phone" name="tel" type="text" placeholder="Telephone" value="<?php echo !empty($tel) ? $tel : ''; ?>">
                    <?php if (!empty($telError)) : ?>
                        <span class="help-inline"><?php echo $telError; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo !empty($countryError) ? 'error' : ''; ?>">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" name="country">
                        <option value="paris">Paris</option>
                        <option value="londres">Londres</option>
                        <option value="amsterdam">Amsterdam</option>
                    </select>
                    <?php if (!empty($countryError)) : ?>
                        <span class="help-inline"><?php echo $countryError; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <p>Job : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="job" id="dev" value="dev" checked <?php if (isset($job) && $job == "dev") echo "checked"; ?>>
                        <label class="form-check-label" for="dev">
                            Software Developer
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="job" id="system" value="system" <?php if (isset($job) && $job == "system") echo "checked"; ?>>
                        <label class="form-check-label" for="system">
                            System Developer
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="job" id="network" value="network" <?php if (isset($job) && $job == "network") echo "checked"; ?>>
                        <label class="form-check-label" for="dev">
                            Network adminisatrator
                        </label>
                    </div>
                </div>
                <?php if (!empty($jobError)) : ?>
                    <span class="help-inline">Veuillez saisir un métier valide</span>
                <?php endif; ?>

                <div class="form-group <?php echo !empty($urlError) ? 'error' : ''; ?>">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="url" value="<?php echo !empty($url) ? $url : ''; ?>">
                    <?php if (!empty($urlError)) : ?>
                        <span class="help-inline">Veuillez saisir une url valide</span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo !empty($commentError) ? 'error' : ''; ?>">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" rows="4" cols="60" name="comment"><?php if (isset($comment)) echo $comment; ?></textarea>
                    <?php if (!empty($commentError)) : ?>
                        <span class="help-inline">Veuillez saisir un commentaire valide</span>
                    <?php endif; ?>
                </div>
                <div class="form-actions">
                    <a class="btn btn-light" href="controller.php">Previous</a>
                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                    <a class="btn" href="controller.php">Retour</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>