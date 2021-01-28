<?php require 'util/database.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { // on initialise nos erreurs
    $nameError = null;
    $firstnameError = null;
    $birthDateError = null;
    $telError = null;
    $emailError = null;
    $countryError = null;
    $commentError = null;
    $jobError = null;
    $urlError = null; // On assigne nos valeurs
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $birthDate = $_POST['birthDate'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $comment = $_POST['comment'];
    $job = $_POST['job'];
    $url = $_POST['url']; // On verifie que les champs sont remplis
    $valid = true;
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    }
    if (empty($firstname)) {
        $firstnameError = 'Please enter firstname';
        $valid = false;
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
    }
    if (!isset($country)) {
        $countryError = 'Please select a country';
        $valid = false;
    }
    if (empty($comment)) {
        $commentError = 'Please enter a description';
        $valid = false;
    }
    if (!isset($job)) {
        $jobError = 'Please select a job';
        $valid = false;
    }
    if (empty($url)) {
        $urlError = 'Please enter website url';
        $valid = false;
    } // mise à jour des donnés
    echo "blqshqsd";
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tp_crud_user SET name = ?,firstname = ?,birthDate = ?,tel = ?, email = ?, country = ?, comment = ?, job = ?, url = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $firstname, $birthDate, $tel, $email, $country, $comment, $job, $url, $id));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tp_crud_user where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $name = $data['name'];
    $firstname = $data['firstname'];
    $birthDate = $data['birthDate'];
    $tel = $data['tel'];
    $email = $data['email'];
    $country = $data['country'];
    $comment = $data['comment'];
    $job = $data['job'];
    $url = $data['url'];
    Database::disconnect();
} ?>


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
            <h3>Add User</h3>
        </div>
        <form method="post" action="edit.php?id=<?php echo $id ;?>">
        
            <div class="control-group<?php echo !empty($firstnameError) ? 'error' : ''; ?>">
                <label class="control-label">First Name</label>
                <div class="controls">
                    <input type="text" name="firstname" value="<?php echo !empty($firstname) ? $firstname : ''; ?>">
                    <?php if (!empty($firstnameError)) : ?>
                        <span class="help-inline"><?php echo $firstnameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($nameError) ? 'error' : ''; ?>">
                <label class="control-label">Last Name</label>
                <div class="controls">
                    <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name) ? $name : ''; ?>">
                    <?php if (!empty($nameError)) : ?>
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo !empty($birthDateError) ? 'error' : ''; ?>">
                <label class="control-label">Birth Date</label>
                <div class="controls">
                    <input type="date" name="birthDate" value="<?php echo !empty($birthDate) ? $birthDate : ''; ?>">
                    <?php if (!empty($birthDateError)) : ?>
                        <span class="help-inline"><?php echo $birthDateError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                <label class="control-label">Email Address</label>
                <div class="controls">
                    <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email) ? $email : ''; ?>">
                    <?php if (!empty($emailError)) : ?>
                        <span class="help-inline"><?php echo $emailError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($telError) ? 'error' : ''; ?>">
                <label class="control-label">Telephone</label>
                <div class="controls">
                    <input name="tel" type="text" placeholder="Telephone" value="<?php echo !empty($tel) ? $tel : ''; ?>">
                    <?php if (!empty($telError)) : ?>
                        <span class="help-inline"><?php echo $telError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo !empty($countryError) ? 'error' : ''; ?>">
                <select name="country">
                    <option value="paris">Paris</option>
                    <option value="londres">Londres</option>
                    <option value="amsterdam">Amsterdam</option>
                </select>
                <?php if (!empty($countryError)) : ?>
                    <span class="help-inline"><?php echo $countryError; ?></span>
                <?php endif; ?>
            </div>
            <div class="control-group<?php echo !empty($jobError) ? 'error' : ''; ?>">
                <label class="checkbox-inline">job</label>
                <div class="controls">
                    Dev : <input type="checkbox" name="job" value="dev" <?php if (isset($job) && $job == "dev") echo "checked"; ?>>
                    Integrateur <input type="checkbox" name="job" value="integrateur" <?php if (isset($job) && $job == "integrateur") echo "checked"; ?>>
                    Reseau <input type="checkbox" name="job" value="reseau" <?php if (isset($job) && $job == "reseau") echo "checked"; ?>>
                </div>
                <?php if (!empty($jobError)) : ?>
                    <span class="help-inline"><?php echo $jobError; ?></span>
                <?php endif; ?>
            </div>
            <div class="control-group  <?php echo !empty($urlError) ? 'error' : ''; ?>">
                <label class="control-label">Siteweb</label>
                <div class="controls">
                    <input type="text" name="url" value="<?php echo !empty($url) ? $url : ''; ?>">
                    <?php if (!empty($urlError)) : ?>
                        <span class="help-inline"><?php echo $urlError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($commentError) ? 'error' : ''; ?>">
                <label class="control-label">Commentaire </label>
                <div class="controls">
                    <textarea rows="4" cols="30" name="comment"><?php if (isset($comment)) echo $comment; ?></textarea>
                    <?php if (!empty($commentError)) : ?>
                        <span class="help-inline"><?php echo $commentError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <a class="btn" href="index.php">Retour</a>
            </div>
        </form>
    </div>
</body>

</html>