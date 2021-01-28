<?php require 'util/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { //on initialise nos messbirthDates d'erreurs;
    $nameError = '';
    $firstnameError = '';
    $birthDateError = '';
    $telError = '';
    $emailError = '';
    $countryError = '';
    $commentError = '';
    $jobError = '';
    $urlError = ''; // on recupère nos valeurs
    $name = htmlentities(trim($_POST['name']));
    $firstname = htmlentities(trim($_POST['firstname']));
    $birthDate = htmlentities(trim($_POST['birthDate']));
    $tel = htmlentities(trim($_POST['tel']));
    $email = htmlentities(trim($_POST['email']));
    $country = htmlentities(trim($_POST['country']));
    $comment = htmlentities(trim($_POST['comment']));
    $job = htmlentities(trim($_POST['job']));
    $url = htmlentities(trim($_POST['url'])); // on vérifie nos champs
    $valid = true;
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameError = "Only letters and white space allowed";
    }
    if (empty($firstname)) {
        $firstnameError = 'Please enter firstname';
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameError = "Only letters and white space allowed";
    }
    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    }
    if (empty($birthDate)) {
        $birthDateError = 'Please enter your birthDate';
        $valid = false;
    }
    if (empty($tel)) {
        $telError = 'Please enter phone';
        $valid = false;
    } else if (!preg_match("/^[0-9]*$/", $tel)) {
        $telError = 'Please enter a valid phone';
        $valid = false;
    }

    if (!isset($country)) {
        $countryError = 'Please select a country';
        $valid = false;
    }

    if (empty($comment)) {
        $commentError = 'Please enter a description';
        $valid = false;
    }

    if (empty($job)) {
        $jobError = 'Please select a job';
        $valid = false;
    }

    if (empty($url)) {
        $urlError = 'Please enter website url';
        $valid = false;
    } else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
        $urlError = 'Enter a valid url';
        $valid = false;
    }

    if ($valid) { // si les données sont présentes et bonnes, on se connecte à la base
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tp_crud_user (name,firstname,birthDate,tel, email, country,comment, job, url) values(?, ?, ?, ? , ? , ? , ? , ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $firstname, $birthDate, $tel, $email, $country, $comment, $job, $url));
        Database::disconnect();
        header("Location: index.php");
    }
}
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
            <h3 class="mt-5 mb-3">Add a user</h3>
        </div>
        <div class="row">
            <form method="post" action="add.php">

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
                    <div class="controls">
                        <select class="form-control" id="country" name="country">
                            <option value="france">France</option>
                            <option value="uk">United Kingdom</option>
                            <option value="usa">USA</option>
                        </select>
                    </div>
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
                    <span class="help-inline"><?php echo $jobError; ?></span>
                <?php endif; ?>

                <div class="form-group <?php echo !empty($urlError) ? 'error' : ''; ?>">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="url" value="<?php echo !empty($url) ? $url : ''; ?>">
                    <?php if (!empty($urlError)) : ?>
                        <span class="help-inline"><?php echo $urlError; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo !empty($commentError) ? 'error' : ''; ?>">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" rows="4" cols="60" name="comment"><?php if (isset($comment)) echo $comment; ?></textarea>
                    <?php if (!empty($commentError)) : ?>
                        <span class="help-inline"><?php echo $commentError; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-actions">
                    <a class="btn btn-light" href="index.php">Previous</a>
                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>