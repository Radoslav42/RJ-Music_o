<?php
require_once "User.php";
require_once "Author.php";
class DBStorage
{
    private $conn;
    public function __construct()
    {
        // connenction to database
        try {
        $this->conn = new PDO("mysql:host=localhost;dbname=rjmusic", "root", "dtb456");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo "Connection failed: ", $e->getMessage();
        }
    }

    public function GetAllAuthors(): array
    {
        //return $this->conn->query("SELECT * FROM authors")->fetchAll(PDO::FETCH_CLASS, Author::class);
        $st = $this->conn->prepare("SELECT * FROM authors");
        $st->execute();
        $authors = $st->fetchAll(PDO::FETCH_CLASS, Author::class);
        return $authors;
    }
    public function ExistUser(User $user, bool $login)
    {
        $username = $user->getUsername();
        $mail = $user->getEmail();
        $password = $user->getPassword();
        if (!$login)
            $st = $this->conn->prepare("SELECT * FROM users where username = '$username' OR email = '$mail'");
        else
            $st = $this->conn->prepare("SELECT * FROM users where (username = '$username' OR email = '$mail') AND password = '$password'");
        $st->execute();
        return $st->rowCount() > 0;
    }
    public function CreateUser(User $user)
    {
        $st = $this->conn->prepare("INSERT INTO users (username, email, password) values (?,?,?)");
        $st->execute([$user->getUsername(), $user->getEmail(), $user->getPassword()]);
    }
    public function CreateAuthor(Author $author)
    {
        $st = $this->conn->prepare("INSERT INTO authors (firstname, lastname, imageFilename) values (?,?,?)");
        $st->execute([$author->getFirstname(), $author->getLastname(), $author->getImageFilename()]);
    }
    public function GetAuthor(Author $author)
    {
        $firstname = $author->getFirstname();
        $lastname = $author->getLastname();
        $imageFilename = $author->getImageFilename();
        $select = "SELECT * FROM authors where firstname = '$firstname' AND lastname = '$lastname' AND imageFilename = '$imageFilename'";
        $st = $this->conn->prepare($select);
        $st->execute();
        if ($st->rowCount() > 0) {
            return $st->fetchAll(PDO::FETCH_CLASS, Author::class)[0];
        }
        else
        {
            return null;
        }
    }
    public function DeleteAuthor($id)
    {
        $st = $this->conn->prepare("DELETE FROM authors WHERE id = ?");
        $st->execute([$id]);

    }
    public function UpdateAuthor(Author $author)
    {
        $firstname = $author->getFirstname();
        $lastname = $author->getLastname();
        $imageFilename = $author->getImageFilename();
        $select = "UPDATE authors SET firstname = '$firstname', Lastname = '$lastname', ImageFilename = '$imageFilename' WHERE id = ?";
        $st = $this->conn->prepare($select);
        $st->execute([$author->getId()]);

    }
    public function UpdateUser($username, $email, $userId)
    {
        $st = $this->conn->prepare("UPDATE users SET username = '$username', email = '$email' WHERE id = ?");
        $st->execute([$userId]);
    }
    public function UpdateUserAuthorId($userId, $authorId)
    {
        $select = "UPDATE users SET authorId = $authorId WHERE id = $userId";
        $st = $this->conn->prepare($select);
        $st->execute();
    }
    public function GetUserByEmailOrUsername($emailOrUsername)
    {
        $st = $this->conn->prepare("SELECT * FROM users where username = '$emailOrUsername' OR email = '$emailOrUsername'");
        $st->execute();
        if ($st->rowCount() > 0) {
            $user = $st->fetchAll(PDO::FETCH_CLASS, User::class);
            $user[0]->setPassword("");
            return $user[0];
        }
        else
        {
            return null;
        }
    }
    public function GetUserById($id)
    {
        $st = $this->conn->prepare("SELECT * FROM users where id = $id");
        $st->execute();
        $user = $st->fetchAll(PDO::FETCH_CLASS, User::class);
        if ($st->rowCount() > 0) {
            $user[0]->setPassword("");
            return $user[0];
        }
        else
        {
            return  null;
        }
    }
    public function GetAuthorByUserAuthorId($id)
    {
        $st = $this->conn->prepare("SELECT * FROM authors where id = $id");
        $st->execute();
        $author = $st->fetchAll(PDO::FETCH_CLASS, Author::class);
        if ($st->rowCount() > 0) {
            return $author[0];
        }
        else
        {
            return  null;
        }
    }
}
