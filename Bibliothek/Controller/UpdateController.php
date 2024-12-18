<?php

namespace Bibliothek\Controller;

use Bibliothek\Model\Author;
use Bibliothek\Model\Book;
use Bibliothek\Model\Type;
use Bibliothek\Model\Genre;
use Bibliothek\Model\BookGenre;

class UpdateController extends DefaultController{
    

    public function index() {
        $this->render("updateData.html.twig", [
        ]);
    }

    public function showAuthors() {
        $authors = Author::all();
        
        $this->render("updateAuthor-overview.html.twig", [
            "authors" => $authors
        ]);
    }

    public function editAuthor(int $id) {
        $author = Author::findById($id);
        $this->render("author-form.html.twig", [
        "author" => $author
        ]);
    }
    public function updateAuthor(int $id, array $data) {
        $author = Author::findById($id);
        $author->setName($data["name"]);
        $author->setPrename($data["prename"]);
        $author->save();
    
        $this->redirect("/update/author");
    }

    public function deleteAuthor(int $id){
        $author = Author::findById($id);
        $author->delete();
    
        $this->redirect("/update/author");
    }

    public function showTypes() {
        $types = Type::all();
        
        $this->render("updateType-overview.html.twig", [
            "types" => $types
        ]);
    }

    public function editType(int $id) {
        $type = Type::findById($id);
        $this->render("type-form.html.twig", [
        "type" => $type
        ]);
    }
    public function updateType(int $id, array $data) {
        $type = Type::findById($id);
        $type->setName($data["name"]);
        $type->save();
    
        $this->redirect("/update/type");
    }

    public function deleteType(int $id){
        $type = Type::findById($id);
        $type->delete();
    
        $this->redirect("/update/type");
    }

    public function showGenres() {
        $genre = Genre::all();
        
        $this->render("updateGenre-overview.html.twig", [
            "genres" => $genre
        ]);
    }

    public function editGenre(int $id) {
        $genre = Genre::findById($id);
        $this->render("genre-form.html.twig", [
        "genre" => $genre
        ]);
    }
    public function updateGenre(int $id, array $data) {
        $genre = Genre::findById($id);
        $genre->setName($data["name"]);
        $genre->save();
    
        $this->redirect("/update/genre");
    }

    public function deleteGenre(int $id){
        $genre = Genre::findById($id);
        $genre->delete();
    
        $this->redirect("/update/genre");
    }

    public function showBooks() {
        $books = Book::all();
        
        $this->render("updateBook-overview.html.twig", [
            "books" => $books
        ]);
    }

    public function editBook(int $id) {
        $book = Book::findById($id);
        $authors = Author::all();
        $types = Type::all();
        $genres = Genre::all();
        $bookgenres = BookGenre::all();
        $this->render("book-form.html.twig", [
        "book" => $book,
        "authors" => $authors,
        "types" => $types,
        "genres" => $genres,
        "bookgenres" => $bookgenres
        ]);
    }
    public function updateBook(int $id, array $data) {
        $book = Book::findById($id);
        $book->setTitle($data["title"]);
        $book->setAuthorid($data["author"]);
        $book->setTypeid($data["type"]);
        $book->setPages($data["pages"]);
        $book->save();

        $existingBookGenres = BookGenre::all();
        foreach ($existingBookGenres as $bookgenre) {
            if ($book->getKey() == $bookgenre->getBookId()){
                $bookgenre->delete();
            }
        }
    
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

        $this->redirect("/update/book");
    }

    public function deleteBook(int $id){
        $book = Book::findById($id);
        $bookGenres = BookGenre::all();

        foreach ($bookGenres as $bookgenre) {
            if ($book->getKey() == $bookgenre->getBookId()){
                $bookgenre->delete();
            }
        }

        $book->delete();
    
        $this->redirect("/update/book");
    }
}