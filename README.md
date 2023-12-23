<img src="public/assets/logo1.png" alt="BookHaven" width="500" />  
  
---

BookHaven is a digital, web-based platform library designed to streamline the process of managing and tracking books in a physical library. This platform serves as a powerful tool for librarians worldwide, allowing them to efficiently organize their book inventory, track book availability, and manage borrower information. BookHaven is built entirely from scratch using a custom web framework developed exclusively with PHP vanilla, without relying on any external libraries or package managers. Its simplicity and independence make it accessible for anyone looking to enhance their library management system.

## Features

- **Book Search:** Users can easily search through a wide variety of books based on titles, authors, genres, or other criteria.

- **Book Information:** Detailed information about each book, including title, author, genre, and availability status, is readily accessible.

- **Inventory Management:** Librarians can manage their book inventory efficiently, adding new books, and marking books as borrowed or available.

- **Borrower Tracking:** The platform allows librarians to keep track of all borrowed books, including borrower details and due dates.

## Technology Stack

BookHaven is built using [Saphpi](https://github.com/MirzaHilmi/Saphpi) a custom web framework built with only PHP vanilla which happens to be my own framework so check it out! The decision to avoid external libraries or package managers emphasizes the platform's independence and ease of use for potential contributors and users.

## Prerequisite

Note that this section is titled 'prerequisite' and not 'prerequisites.' Why? Because you only require one prerequisite, apart from Git, which is utilized to clone this repository to your local machine — and that is PHP itself. The version needed to run this web app is **PHP version 8.2** or later.

## How to Use

1. **Clone the Repository:**
   ```
   git clone https://github.com/MirzaHilmi/BookHaven.git
   ```

2. **Fill out the environtment variables**
   - Copy `.env.example` file to `.env`
   - Fill out the specified variable with your MySQL/MariaDB credential. ie,
   ```shell
   DB_USERNAME=john_doe
   ...
   ```

3. **Run the Project:**
   - Open the newly clone project and run the migrations file to populate the database schema
   ```shell
   php moo migrate
   ```
   - Run serve command to start the server
   ```shell
   php moo serve
   ```
   It'll run the web server on localhost port 8080
   - Access the platform through a web browser.

## License

This project is licensed under the [MIT License](LICENSE).

## Acknowledgments

Special thanks to all contributors who have helped shape and improve BookHaven.  

<a href="https://github.com/MirzaHilmi/BookHaven/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=MirzaHilmi/BookHaven" />
</a>
