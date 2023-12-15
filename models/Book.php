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
    public int $Views;
    public bool $Borrowed;
    public string $Bookshelf;
    public string $CreatedAt;
    public string $UpdatedAt;

    /** @return Book[] */
    public static function fetchPartial(int $amount): array {
        $query = "
        SELECT Books.*, Authors.Name AS Author
        FROM Books
        INNER JOIN Authors
        ON Books.AuthorID = Authors.ID
        ORDER BY RAND() LIMIT {$amount}";

        $result = MySQL::db()->query($query);

        $books = [];
        while ($book = $result->fetch_object()) {
            $books[] = $book;
        }

        return $books;
    }

    public static function fetchByID(int $id): Book {
        $query = '
        SELECT Books.*, Authors.Name AS Author, Authors.Biography AS AuthorBio
        FROM Books
        INNER JOIN Authors
        ON Books.AuthorID = Authors.ID
        WHERE Books.ID = ?
        LIMIT 1';

        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $book = $stmt->get_result()->fetch_object(Book::class);
        if ($book === null) {
            throw new \Exception('Book Not Found');
        }

        return $book;
    }

    public static function getBorrowedTimes(int $id): int {
        $query = '
        SELECT COUNT(*) AS BorrowedTimes
        FROM BorrowedBooks
        WHERE BookID = ?
        LIMIT 1';

        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        if ($result === null) {
            throw new \Exception('Book Not Found');
        }

        return $result['BorrowedTimes'];
    }

    public static function incrementViews(int $id): void {
        $query = '
        UPDATE Books
        SET Views = Views + 1
        WHERE ID = ?';

        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
