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
        <form  action="controller.php?id=<?= $user->id;?>&action=edit" method="post">
        
            <div class="control-group<?php echo !empty($firstnameError) ? 'error' : ''; ?>">
                <label class="control-label">First Name</label>
                <div class="controls">
                    <input type="text" name="user[firstname]" value="<?= $user->firstname; ?>">
                   
                    <?php 
                    
                    if(!$user->validatefield('firstname')):?>
                        <span class="help-inline">Vous devez renseigner un prénom valide</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($nameError) ? 'error' : ''; ?>">
                <label class="control-label">Last Name</label>
                <div class="controls">
                    <input name="user[name]" type="text" placeholder="Name" value="<?= $user->name ?>">
                    <?php if (!$user->validateField('name')) : ?>
                        <span class="help-inline">Veuillez saisir un nom valide</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo !empty($birthDateError) ? 'error' : ''; ?>">
                <label class="control-label">Birth Date</label>
                <div class="controls">
                    <input type="date" name="user[birthDate]" value="<?= $user->birthDate ?>">
                    <?php if (!$user->validateField('birthDate')) : ?>
                        <span class="help-inline">Veuillez saisir une date valide</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                <label class="control-label">Email Address</label>
                <div class="controls">
                    <input name="user[email]" type="text" placeholder="Email Address" value="<?= $user->email ?>">
                    <?php if (!$user->validateField('email')) : ?>
                        <span class="help-inline">Veuillez saisir un email valide</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($telError) ? 'error' : ''; ?>">
                <label class="control-label">Telephone</label>
                <div class="controls">
                    <input name="user[tel]" type="text" placeholder="Telephone" value="<?= $user->tel ?>">
                    <?php if (!$user->validateField('tel')): ?>
                        <span class="help-inline">Veuillez saisir un téléphone valide</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo !empty($countryError) ? 'error' : ''; ?>">
                <select name="user[country]">
                    <option value="paris">Paris</option>
                    <option value="londres">Londres</option>
                    <option value="amsterdam">Amsterdam</option>
                </select>
                <?php if (!$user->validateField('country')) : ?>
                    <span class="help-inline">Veuillez saisir une ville valide</span>
                <?php endif; ?>
            </div>
            <div class="control-group<?php echo !empty($jobError) ? 'error' : ''; ?>">
                <label class="checkbox-inline">job</label>
                <div class="controls">
                    Dev : <input type="checkbox" name="user[job]" value="dev" <?php if ($user->job == "dev") echo "checked"; ?>>
                    Integrateur <input type="checkbox" name="user[job]" value="integrateur" <?php if ($user->job == "integrateur") echo "checked"; ?>>
                    Reseau <input type="checkbox" name="user[job]" value="reseau" <?php if ($user->job == "reseau") echo "checked"; ?>>
                </div>
                <?php if (!$user->validateField('job')) : ?>
                    <span class="help-inline">Veuillez saisir un métier valide</span>
                <?php endif; ?>
            </div>
            <div class="control-group  <?php echo !empty($urlError) ? 'error' : ''; ?>">
                <label class="control-label">Siteweb</label>
                <div class="controls">
                    <input type="text" name="user[url]" value="<?= $user->tel ?>">
                    <?php if (!$user->validateField('url')) : ?>
                        <span class="help-inline">Veuillez saisir une url valide</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($commentError) ? 'error' : ''; ?>">
                <label class="control-label">Commentaire </label>
                <div class="controls">
                    <textarea rows="4" cols="30" name="user[comment]"><?=$user->comment; ?></textarea>
                    <?php if (!$user->validateField('comment')) :?>
                        <span class="help-inline">Veuillez saisir un commentaire valide</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <input type="hidden" class="btn btn-success" name="user[id]" value=<?=$user->id; ?>>
                <a class="btn" href="controller.php">Retour</a>
            </div>
        </form>
    </div>
</body>

</html>