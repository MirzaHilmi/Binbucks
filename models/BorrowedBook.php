<?php
namespace Saphpi\Models;

use Saphpi\Core\MySQL;

class BorrowedBook {
    public int $ID;
    public int $BookID;
    public string $Name;
    public string $Email;
    public string $BorrowedDate;
    public string $DueDate;
    public string $ReturnDate;

    public static function borrow(BorrowedBook $borrowed) {
        $query = '
        INSERT INTO BorrowedBooks (BookID, Name, Email, BorrowedDate, DueDate)
        VALUE (?, ?, ?, ?, ?)';

        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param(
            'issss',
            $borrowed->BookID,
            $borrowed->Name,
            $borrowed->Email,
            $borrowed->BorrowedDate,
            $borrowed->DueDate,
        );
        $stmt->execute();
        $stmt->close();

        $query = '
        UPDATE Books
        SET Borrowed = 1
        WHERE ID = ?';

        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param('i', $borrowed->BookID);
        $stmt->execute();
    }

    public static function returnBook(string $isbn, string $borrower) {
        $query = 'SELECT ID, Borrowed FROM Books WHERE ISBN = ? LIMIT 1';
        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param('s', $isbn);
        $stmt->execute();

        $book = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($book === null) {
            throw new \Exception('Book Not Found');
        } elseif ($book['Borrowed'] == 0) {
            throw new \Exception('That book isn\'t currenly borrowed by anyone');
        }

        $query = '
        UPDATE BorrowedBooks
        SET ReturnDate = ?
        WHERE ID = (
            SELECT ID
            FROM BorrowedBooks
            WHERE BookID = ? AND Name = ?
            ORDER BY CreatedAt DESC
            LIMIT 1
        )';

        $stmt = MySQL::db()->prepare($query);
        $now = date('Y-m-d');
        $stmt->bind_param('sis', $now, $book['ID'], $borrower);
        $stmt->execute();
        $stmt->close();

        $query = '
        UPDATE Books
        SET Borrowed = 0
        WHERE ID = ?';

        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param('i', $book['ID']);
        $stmt->execute();
    }
}
