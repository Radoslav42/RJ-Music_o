<?php
session_start();
require_once "DBStorage.php";
require_once "UserController.php";
$user = new UserController();
class UserController
{
//tu bude prebiehat kontrola, ci su zadane udaje od uzivatela spravne
    private DBStorage $dbStorage;
    private User $user;
    private ?Author $author;
    public function __construct()
    {
        $_SESSION["ServerMessages"] = "";
        $this->dbStorage = new DBStorage();
        $this->user = new User();
        $this->author = new Author();
        if ($this->HasRequiredLogin()) {
            $this->user->setUsername($_POST['user_name_mail']);
            $this->user->setEmail($_POST['user_name_mail']);
            $this->user->setPassword($_POST['password']);
            if ($this->dbStorage->ExistUser($this->user, true)) {
                $this->user = $this->dbStorage->GetUserByEmailOrUsername($this->user->getUsername());
                $_SESSION["LoggedUserId"] = $this->user->getId();

                $this->author = $this->GetLoggedAuthor();
                if ($this->author == null)
                    $this->author = new Author();
                require_once "UserView.php";
            }
            else {
                $_SESSION["ServerMessages"] = "Používateľ neexistuje!";
                require_once "Login.php";
            }
        }
        else if ($this->HasRequiredRegistration())
        {
            $this->user->setUsername($_POST['user_name']);
            $this->user->setEmail($_POST['email']);
            $this->user->setPassword($_POST['password']);
            //$this->user = new User(0, $_POST['user_name'], $_POST['email'], $_POST['password'], null);

            if (!$this->dbStorage->ExistUser($this->user, false)) {
                $this->dbStorage->CreateUser($this->user);
                require_once "Login.php";
            }
            else
            {
                $_SESSION["ServerMessages"] = "Užívateľ už existuje!";
                require_once "Registration.php";
            }
        }
        else
        {
            $this->user = $this->GetLoggedUser();
            $this->author = $this->GetLoggedAuthor();
            if ($this->author == null)
                $this->author = new Author();
        }
        if ($this->HasRequiredUpdateUser())
        {
            $this->dbStorage->UpdateUser($_POST['user_name'], $_POST['email'], $_SESSION["LoggedUserId"]);
            $this->user->setUsername($_POST['user_name']);
            $this->user->setEmail($_POST['email']);
            require_once "UserView.php";
        }
        else if ($this->HasRequiredCreateOrUpdateAuthor())
        {
            if ($this->GetLoggedAuthor() == null)
                $this->CreateLoggedAuthor();
            else
                $this->UpdateLoggedAuthor();
            require_once "UserView.php";
        }
        else if ($this->HasRequiredDeleteAuthor())
        {
            if ($this->GetLoggedAuthor() != null)
                $this->DeleteLoggedAuthor();
            require_once "UserView.php";
        }
    }
    public function GetLoggedUser()
    {
        if (isset($_SESSION["LoggedUserId"]))
            return $this->dbStorage->GetUserById($_SESSION["LoggedUserId"]);
        else
            return null;
    }

    public function HasRequiredUpdateUser()
    {
        return isset($_POST['updateUserButton']) && $this->ValidateLengthFrom3To30Characters($_POST['user_name']) &&  $this->ValidateLengthFrom3To30Characters($_POST['email']);
    }
    public function HasRequiredLogin()
    {
        return isset($_POST['user_name_mail']) && isset($_POST['password']) &&  $this->ValidateLengthFrom3To30Characters($_POST['user_name_mail'])  &&  $this->ValidateLengthFrom3To30Characters($_POST['password']);
    }
    public function HasRequiredRegistration()
    {
        return isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['password']) && $this->ValidateEmail($_POST['email']) &&  $this->ValidateLengthFrom3To30Characters($_POST['user_name']) && $this->ValidateLengthFrom3To30Characters($_POST['email']) &&  $this->ValidateLengthFrom3To30Characters($_POST['password']);
    }
    public function ValidateLengthFrom3To30Characters($str)
    {
        if (!$this->IsEmptyString($str))
            return strlen($str) >= 3 && strlen($str) <= 30;
        else {
            $_SESSION["ServerMessages"] = "Nesprávna dľžka retazca!";
            return false;
        }
    }
    public function IsEmptyString($str)
    {
        if ($str != null)
            return strlen($str) == 0;
        else {
            $_SESSION["ServerMessages"] = "Prázdny reťazec!";
            return false;
        }
    }
    public function ValidateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function HasRequiredCreateOrUpdateAuthor()
    {
        return isset($_POST['updateAuthorButton']);
    }
    public function HasRequiredDeleteAuthor()
    {
        return isset($_POST['deleteAuthorButton']);
    }
    public function CreateLoggedAuthor()
    {
        if ($_FILES["imageFilename"]["error"] == UPLOAD_ERR_OK)
        {
            $this->UpdateAuthor();
            $this->dbStorage->CreateAuthor($this->author);
            $this->author = $this->dbStorage->GetAuthor($this->author);
            $this->dbStorage->UpdateUserAuthorId($_SESSION["LoggedUserId"], $this->author->getId());
        }
    }
    public function DeleteLoggedAuthor()
    {
        $this->dbStorage->DeleteAuthor($this->author->getId());
    }
    public function GetLoggedAuthor()
    {
        if ($this->user != null && $this->user->getAuthorId() != null)
            return $this->dbStorage->GetAuthorByUserAuthorId($this->user->getAuthorId());
        else
            return null;
    }
    private function UpdateAuthor()
    {
        $this->author->setFirstname($_POST['firstname']);
        $this->author->setLastname($_POST['lastname']);
        $tmp_name = $_FILES["imageFilename"]["tmp_name"];
        $name = $_FILES["imageFilename"]["name"];
        $path = "Resources/Images/$name";
        move_uploaded_file($tmp_name, $path);
        $this->author->setImageFilename($path);
    }
    public function UpdateLoggedAuthor()
    {
        if ($_FILES["imageFilename"]["error"] == UPLOAD_ERR_OK)
        {
            $this->UpdateAuthor();
            $this->dbStorage->UpdateAuthor($this->author);
        }
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }
}

