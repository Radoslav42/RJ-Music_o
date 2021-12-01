<?php
require_once "UserController.php";
$userController = new UserController();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/RJ-Music/Styles.css" type="text/css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h1><img src="<?= $userController->getAuthor()->getImageFilename() ?>" alt="" width="70" height="70" class="d-inline-block align-text-top">  <?= $userController->getAuthor()->getFirstname() ?> <?= $userController->getAuthor()->getLastname() ?></h1>
            </a>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/RJ-Music/User.php" >Používateľské údaje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/RJ-Music/Authors.php" >Interpreti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/RJ-Music/Login.php">Odhlasiť sa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container col-xl-4 col-md-6 col-sm-8" id="userContainer">
        <div class="row">
            <h2>Používateľské údaje</h2>
            <form method="post" action="/RJ-Music/UserController.php" enctype="application/x-www-form-urlencoded">
                <div class="mt-2 ">
                    <label for="usernameForm" class="form-label">Používateľské meno:</label>
                    <input type="text" id="usernameForm" class="form-control" name="user_name" value="<?=$userController->getUser()->getUsername()?>" required="required" minlength="3" maxlength="30">
                </div>
                <div class="mt-2">
                    <label for="usernameForm" class="form-label">Email:</label>
                    <input type="email" id="EmailForm" class="form-control" name="email" value="<?=$userController->getUser()->getEmail()?>" required="required" minlength="3" maxlength="30">
                </div>
                <button type="submit" class="btn btn-primary" name="updateUserButton" id="buttonForm">Aktualizovať údaje</button>
            </form>
            <div class="row" id="forgotPassworDrow">
                <a href="#" class="blacklink">Obnoviť heslo</a>
            </div>
        </div>
        <p></p>
        <div class="row">
            <h2>Údaje interpreta</h2>
            <form method="post"  enctype="multipart/form-data">
                <div class="mt-2 ">
                    <label for="firstnameForm" class="form-label">Meno:</label>
                    <input type="text" id="firstnameForm" class="form-control" name="firstname" required value="<?=$userController->getAuthor()->getFirstname()?>" minlength="3" maxlength="30">
                </div>
                <div class="mt-2">
                    <label for="lastnameForm" class="form-label">Priezvisko:</label>
                    <input type="text" id="lastnameForm" class="form-control" name="lastname" required value="<?=$userController->getAuthor()->getLastname()?>" minlength="3" maxlength="30">
                </div>
                <div class="mt-2">
                    <label for="imageFilenameForm" class="form-label">Obrázok interpreta:</label>
                    <input type="file" id="imageFilenameForm" class="form-control" name="imageFilename" required value">
                </div>
                <button type="submit"  name="updateAuthorButton" class="btn btn-primary" id="buttonForm"><?= $userController->getAuthor()->getFirstname() != null ? 'Aktualizovať údaje interpreta' : 'Vytvor interpreta'?></button>
            </form>
            <form method="post"  enctype="application/x-www-form-urlencoded">
                <?php if ($userController->getAuthor()->getFirstname() != null) : ?>
                    <button type="submit" name="deleteAuthorButton"  class="btn btn-primary" id="buttonForm">Zmazat interpreta</button>
                <?php endif ?>
            </form>
        </div>
    </div>
</body>
</html>
