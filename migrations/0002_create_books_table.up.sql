CREATE TABLE Books
(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    AuthorID INT,
    ISBN VARCHAR(13),
    Title VARCHAR(255),
    CoverURL VARCHAR(255),
    ReleaseYear VARCHAR(255),
    Edition VARCHAR(255),
    Publisher VARCHAR(255),
    PublisherOrigin VARCHAR(255),
    Language VARCHAR(255),
    Pages INT,
    Synopsis TEXT,
    Rating INT,
    HardCopy BOOLEAN,
    EBook BOOLEAN,
    AudioBook BOOLEAN,
    Borrowed BOOLEAN,
    Bookshelf VARCHAR(255),
    CreatedAt DATETIME DEFAULT (NOW()),
    UpdatedAt DATETIME DEFAULT (NOW())
);

ALTER TABLE Books ADD CONSTRAINT BooksFKAuthorID FOREIGN KEY (AuthorID) REFERENCES Authors (ID);
