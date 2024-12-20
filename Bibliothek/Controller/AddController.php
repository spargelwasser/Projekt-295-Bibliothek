<?php

namespace Bibliothek\Controller;

use Bibliothek\Model\Author;
use Bibliothek\Model\Book;
use Bibliothek\Model\Type;
use Bibliothek\Model\Genre;
use Bibliothek\Model\BookGenre;

class AddController extends DefaultController{

    public function index() {
        $this->render("addData.html.twig", [
        ]);
    }

    //Author
    public function addAuthor() {
        $this->render("author-form.html.twig", [
        ]);
    }

    public function storeAuthor( array $data) {
        $author = new Author();
        $author->setName($data["name"]);
        $author->setPrename($data["prename"]);
        $author->save();

        $this->redirect("/");
    }


    // Book
    public function addBook() {
        $authors = Author::all();
        $types = Type::all();
        $genres = Genre::all();
        $this->render("book-form.html.twig", [
            "authors" => $authors,
            "types" => $types,
            "genres" => $genres
        ]);
    }

    public function storeBook( array $data) {
        $book = new Book();
        $book->setTitle($data["title"]);
        $book->setAuthorid($data["author"]);
        $book->setTypeid($data["type"]);
        $book->setPages($data["pages"]);
        $book->save();

        if (isset($data["genres"]) && is_array($data["genres"])) {
        foreach ($data["genres"] as $genreId) {
            
            if (is_numeric($genreId)) {
                $bookgenre = new BookGenre();
                $bookgenre->setBookId($book->getKey());
                $bookgenre->setGenreId($genreId);
                $bookgenre->save();
            }
            
        }
    }
        
        $this->redirect("/");
    }


    // Genre
    public function addGenre() {
        $this->render("genre-form.html.twig", [
        ]);
    }

    public function storeGenre( array $data) {
        $genre = new Genre();
        $genre->setName($data["name"]);
        $genre->save();

        $this->redirect("/");
    }

    // Type
    public function addType() {
        $this->render("type-form.html.twig", [
        ]);
    }

    public function storeType( array $data) {
        $type = new Type();
        $type->setName($data["name"]);
        $type->save();

        $this->redirect("/");
    }
    
}  