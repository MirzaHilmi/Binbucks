CREATE TABLE BorrowedBooks
(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    BookID INT,
    Name VARCHAR(255),
    Email VARCHAR(255),
    BorrowedDate DATE,
    DueDate DATE,
    ReturnDate DATE,
    CreatedAt DATETIME DEFAULT (NOW()),
    UpdatedAt DATETIME DEFAULT (NOW())
);

ALTER TABLE BorrowedBooks ADD CONSTRAINT BorrowedBooksFKBookID FOREIGN KEY (BookID) REFERENCES Books (ID);
