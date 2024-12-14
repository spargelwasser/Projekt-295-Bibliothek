<?php

namespace Bibliothek\Controller;

use Bibliothek\Model\Book;
use Bibliothek\Model\Author;

class AuthorController extends DefaultController{
    public function index() {
        $authors = Author::all();
        $books = Book::all();

        $this->render("author-overview.html.twig", [
            "books" => $books,
            "authors" => $authors
        ]);
    }

    /* public function create() {
        $this->render("book-form.html.twig");
    }

    public function store(array $data) {
        $book = new Book();
        $book->settitle($data["bookTitle"]);
        $book->setauthorid($data["authorId"]);
        $book->settypeid($data["typeId"]);
        $book->setpages($data["bookPages"]);
        $book->save();

        $this-> redirect("/book");
    }

    public function edit(int $id) {
        $book = Book::findByKey($id);

        $this->render("book-form.html.twig", [
            "Book" => $book
        ]);
    }

    public function update(int $id, array $data) {
        $book = Book::findByKey($id);
        $book->settitle($data["bookTitle"]);
        $book->setauthorid($data["authorId"]);
        $book->settypeid($data["typeid"]);
        $book->setpages($data["bookPages"]);
        $book->save();

        $this->redirect("/book");
    } */

}