<?php

namespace Bibliothek\Model;

use Bibliothek\Gateway\BookGateway;

class Book {

    private int $bookKey = 0;
    private string $bookTitle;
    private int $authorId;
    private int $typeId;
    private int $bookPages;

    public function getKey(): int {
        return $this->bookKey;
    }

    public function settitle(string $title): void {
        $this->bookTitle = $title;
    }

    public function gettitle(): string {
        return $this->bookTitle;
    }

    public function setauthorid(int $authorId): void {
        $this->authorId = $authorId;
    }

    public function getauthorid(): int {
        return $this->authorId;
    }

    public function settypeid(int $typeId): void {
        $this->typeId = $typeId;
    }

    public function gettypeid(): int {
        return $this->typeId;
    }

    public function setpages(int $pages): void {
        $this->bookPages = $pages;
    }

    public function getpages(): int {
        return $this->bookPages;
    }

    public static function all(): array{
        $gateway = new BookGateway();
        $books = [];

        $dbBooks = $gateway->all();

        foreach($dbBooks as $dbBook){
            $books[] = self::create($dbBook);
        }

        return $books;

    }

     private static function create(array $tmpBook): Book {
        $book = new Book();
        $book->bookKey = $tmpBook["bookKey"];
        $book->bookTitle = $tmpBook["bookTitle"];
        $book->authorId = $tmpBook["authorId"];
        $book->typeId = $tmpBook["typeId"];
        $book->bookPages = $tmpBook["bookPages"];
        return $book;
    }
/*
    public function save() {
        $gateway = new BookGateway();
        if($this->bookKey > 0){
            $gateway->update($this->bookKey, $this->getAttributesAsAsiArray());
        } else {
            $this->bookKey = $gateway->insert($this->getAttributesAsAsiArray());
        }
    }

    private function getAttributesAsAsiArray() : array {
        return [
            "bookTitle"=> $this->bookTitle,
            "authorId"=> $this->authorId,
            "typeId"=> $this->typeId,
            "bookPages"=> $this->bookPages
        ];
    }

    public static function findByKey(int $key): ?Book {
        $gateway = new BookGateway();

        $tmpBook = $gateway->findById($key);
        $book = null;

        if( $tmpBook ) {
            $book = self::create($tmpBook);
        }
        return $book;
    } */

}