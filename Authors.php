<?php
 require_once "AuthorsController.php";
$authorsController = new AuthorsController();
$author = new Author();
$author->firstname = "Rado";

$pokus = "pokus";
$b = json_encode($author);
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
                <h1><img src="/RJ-Music//Resources/Images/RJ_Music_500x500.png" alt="" width="70" height="70" class="d-inline-block align-text-top">   Radoslav Joob</h1>
            </a>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/RJ-Music/UserView.php" >Používateľské údaje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/RJ-Music/Authors.php" >Interpreti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/RJ-Music/Login.php">Odhlasiť sa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <p>Hľadaj:</p>
        <input type="text" id="FindInput" width="500"  oninput="TextChange(this.value)">
        <p>Počet vyskytov:</p>
        <input type="text" id="countFindings" value="0" readonly>
        <script >
            var authors = JSON.parse('<?= json_encode($authorsController->GetAllAuthors()); ?>');

            function TextChange(inputText){
                count = 0;
                for (i = 0; i < authors.length; i++)
                {
                    if (authors[i].firstname.includes(inputText) || authors[i].lastname.includes(inputText))
                        count++;
                }
                $countFindings = document.getElementById("countFindings");
                $countFindings.value = count;
            }
        </script>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <?php foreach ($authorsController->GetAllAuthors() as $author) { ?>
                <div class="col-8">
                    <img src="<?= $author->getImageFilename() ?>"
                    <p>
                    <h2><?=$author->getFirstname()?> <?=$author->getLastname()?></h2>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
