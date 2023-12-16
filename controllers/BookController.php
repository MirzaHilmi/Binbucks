<?php
namespace Saphpi\Controllers;

use Saphpi\Models\Book;
use Saphpi\Core\Request;
use Saphpi\Core\Validator;
use Saphpi\Core\Controller;
use Saphpi\Core\Application;

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

        return $this->render('layouts/app>books/index', ['books' => $books], 'BookHaven | Daftar Buku');
    }

    public function details(int $id): string {
        Book::incrementViews($id);

        return $this->render('layouts/app>books/details', [
            'book'          => Book::fetchByID($id),
            'borrowedTimes' => Book::getBorrowedTimes($id),
            'randoms'       => Book::fetchPartial(7),
        ], 'BookHaven | Buku');
    }

    public function create(): string {
        return $this->render('layouts/app>books/create');
    }

    public function handleCreate(Request $request): void {
        $data = Validator::validate($request->getBody(), [
            'title'           => ['Required'],
            'isbn'            => ['Required'],
            'releaseYear'     => ['Required'],
            'authorName'      => ['Required'],
            'authorBio'       => ['Required'],
            'publisher'       => ['Required'],
            'publisherOrigin' => ['Required'],
            'edition'         => ['Required'],
            'language'        => ['Required'],
            'pages'           => ['Required'],
            'bookshelf'       => ['Required'],
            'synopsis'        => ['Required'],
        ]);

        if (isset($data['errors'])) {
            $this->response->withFlash($data['errors'], 'errors');
            $this->redirect('/buku/simpan');
            return;
        }

        $payload = $data['validated'];
        $payload['hardCopy'] = $payload['hardCopy'] === 'on' ? true : false;
        $payload['eBook'] = $payload['eBook'] === 'on' ? true : false;
        $payload['audioBook'] = $payload['audioBook'] === 'on' ? true : false;

        try {
            $payload['coverURL'] = $this->storePicture('coverPicture');
            Book::store($payload);
        } catch (\Throwable $th) {
            $this->response->withFlash($th->getMessage());
            $this->redirect('/buku/simpan');
            return;
        }

        $this->response->withFlash('Book created successfuly');
        $this->redirect('/buku/simpan');
    }

    private static function storePicture(string $fieldName): string {
        if (getimagesize($_FILES[$fieldName]['tmp_name']) === false) {
            throw new \Exception('Upload file is not a valid image');
        } elseif ($_FILES[$fieldName]['size'] > 500000) {
            throw new \Exception('File too Large');
        }

        $sourcePath = Application::$ROOT_DIR . '/public/runtime/';
        $fileName = bin2hex(random_bytes(10)) . basename($_FILES[$fieldName]['name']);
        if (move_uploaded_file($_FILES[$fieldName]['tmp_name'], "{$sourcePath}/{$fileName}") === false) {
            throw new \Exception('Fail to store image sent');
        }

        return "/runtime/{$fileName}";
    }

    public function delete(Request $request): void {
        $payload = $request->getBody();

        Book::delete($payload['id']);

        $this->response->withFlash('Book deleted successfuly');
        $this->redirect('/buku');
    }
}
