<?php
namespace Saphpi\Controllers;

use Saphpi\Models\Book;
use Saphpi\Core\Request;
use Saphpi\Core\Controller;

class BookController extends Controller {
    public function index(Request $request): string {
        $queryStr = $request->getBody();
        if (isset($queryStr['id'])) {
            return $this->details($queryStr['id']);
        } elseif (isset($queryStr['query']) && !empty($queryStr['query'])) {
            $books = Book::fetchByKeyword($queryStr['query']);
        } else {
            $books = Book::fetchPartial(80);
        }

        return $this->render('layouts/app>books/index', ['books' => $books]);
    }

    public function details(int $id): string {
        Book::incrementViews($id);

        return $this->render('layouts/app>books/details', [
            'book'          => Book::fetchByID($id),
            'borrowedTimes' => Book::getBorrowedTimes($id),
            'randoms'       => Book::fetchPartial(7),
        ]);
    }
}
