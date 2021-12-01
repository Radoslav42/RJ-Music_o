<?php
require_once "DBStorage.php";
require_once "Author.php";
class AuthorsController
{
    private DBStorage $dbStore;
    public function __construct()
    {
        $this->dbStore = new DBStorage();

    }
    public function GetAllAuthors(): array
    {
        return $this->dbStore->GetAllAuthors();
    }
}