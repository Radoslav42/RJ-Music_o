<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Domov</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/RJ-Music/Styles.css" type="text/css">
</head>
<body>
<div id="carouselWithCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselWithCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselWithCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselWithCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active ">
            <img src="/RJ-Music/Resources/Images/RJ_Music_500x500.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Music Forever!</h5>
                <p></p>
            </div>
        </div>
        <div class="carousel-item ">
            <img src="/RJ-Music/Resources/Images/Conflict.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Music Forever!</h5>
                <p></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/RJ-Music/Resources/Images/CakewalkUI.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Create music in Cakewalk Sonar!</h5>
                <p>One of the best DAW software on the world!</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselWithCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselWithCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h1><img src="/RJ-Music//Resources/Images/RJ_Music_500x500.png" alt="" width="70" height="70" class="d-inline-block align-text-top">   Radoslav Joob</h1>
        </a>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/RJ-Music/Home.php" >Domov</a>
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

</body>
</html>