<?php
namespace Saphpi\Models;

use Saphpi\Core\MySQL;

class Book {
    public int $ID;
    public int $AuthorID;
    public string $ISBN;
    public string $Author;
    public string $Title;
    public string $CoverURL;
    public string $ReleaseYear;
    public string $Edition;
    public string $Publisher;
    public string $PublisherOrigin;
    public string $Language;
    public int $Pages;
    public string $Synopsis;
    public string $Rating;
    public bool $HardCopy;
    public bool $EBook;
    public bool $AudioBook;
    public bool $Borrowed;
    public string $Bookshelf;
    public \DateTime $CreatedAt;
    public \DateTime $UpdatedAt;

    /** @return Book[] */
    public static function fetchPartial(int $amount): array {
        $query = "SELECT Books.*, Authors.Name AS Author FROM Books INNER JOIN Authors ON Books.AuthorID = Authors.ID ORDER BY RAND() LIMIT {$amount}";
        $result = MySQL::db()->query($query);

        $books = [];
        while ($book = $result->fetch_object()) {
            $books[] = $book;
        }

        return $books;
    }
}
