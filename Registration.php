<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrácia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/RJ-Music/Styles.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h1><img src="/RJ-Music/Resources/Images/RJ_Music_500x500.png" alt="" width="70" height="70" class="d-inline-block align-text-top">   Radoslav Joob</h1>
        </a>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/RJ-Music/Home.php" >Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/RJ-Music/About.php">O mne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/RJ-Music/Discography.php">Diskografia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/RJ-Music/Login.php">Prihlásenie</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container col-xl-3 col-md-5 col-sm-7" id="loginContainer">
    <div class="row">
        <p style="color: red "><?= ($_SESSION["ServerMessages"] ?? "")?></p>
        <h2>Registrácia</h2>
        <form method="post" action="/RJ-Music/UserController.php" enctype="application/x-www-form-urlencoded">
            <div class="mt-2 ">
                <label for="usernameForm" class="form-label">Používateľské meno:</label>
                <input type="text" id="usernameForm" class="form-control" name="user_name" value="" required="required" minlength="3" maxlength="30">
            </div>
            <div class="mt-2">
                <label for="usernameForm" class="form-label">Email:</label>
                <input type="email" id="EmailForm" class="form-control" name="email" value="" required="required" minlength="3" maxlength="30">
            </div>
            <div class="mt-2">
                <label for="passForm" class="form-label">Heslo:</label>
                <input type="password" id="passForm" class="form-control" name="password" value="" required="required" minlength="3" maxlength="30">
            </div>
            <button type="submit" class="btn btn-primary" id="buttonForm">Registrovať</button>
        </form>
    </div>
    <div class="row" id="registration">
        <a href="/RJ-Music/Login.php" class="blacklink">Prihlásenie</a>
    </div>
</div>
</body>
</html>