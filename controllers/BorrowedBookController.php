<?php
namespace Saphpi\Controllers;

use Saphpi\Models\Book;
use Saphpi\Core\Request;
use Saphpi\Core\Validator;
use Saphpi\Core\Controller;
use Saphpi\Models\BorrowedBook;
use Saphpi\Middlewares\Authenticated;

class BorrowedBookController extends Controller {
    public function __construct() {
        $this->registerMiddlewares(new Authenticated(['borrow', 'handleBorrow']));
    }

    public function borrow(): string {
        return $this->render('layouts/app>books/borrow', ['books' => Book::fetchPartial(40)], 'BookHaven | Pinjam');
    }

    public function handleBorrow(Request $request): void {
        $data = Validator::validate($request->getBody(), [
            'bookID'       => ['Required'],
            'name'         => ['Required'],
            'email'        => ['Required'],
            'borrowedDate' => ['Required'],
            'dueDate'      => ['Required'],
        ]);

        if (isset($data['errors'])) {
            $this->response->withFlash('Semua input data formulir harus diisi');
            $this->redirect('/buku/pinjam');
            return;
        }

        $payload = $data['validated'];

        if ($payload['borrowedDate'] >= $payload['dueDate']) {
            $this->response->withFlash('Tanggal pinjam tidak bisa lebih dari tanggal kembali');
            $this->redirect('/buku/pinjam');
            return;
        }

        $borrowedBook = new BorrowedBook;
        $borrowedBook->BookID = $payload['bookID'];
        $borrowedBook->Name = $payload['name'];
        $borrowedBook->Email = $payload['email'];
        $borrowedBook->BorrowedDate = $payload['borrowedDate'];
        $borrowedBook->DueDate = $payload['dueDate'];

        try {
            BorrowedBook::borrow($borrowedBook);
        } catch (\Throwable $th) {
            $this->response->withFlash($th->getMessage());
            $this->redirect('/buku/pinjam');
            return;
        }

        $this->response->withFlash('Berhasil meminjam buku');
        $this->redirect('/buku/pinjam');
    }
}
