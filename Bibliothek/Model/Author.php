<?php

namespace Bibliothek\Model;

use Bibliothek\Gateway\AuthorGateway;

class Author {
    private int $authorKey = 0;
    private string $authorName;
    private string $authorPrename;

    public function getKey(): int {
        return $this->authorKey;
    }

    public function setName(string $name): void {
        $this->authorName = $name;
    }

    public function getName(): string {
        return $this->authorName;
    }
    public function setPrename(string $prename): void {
        $this->authorName = $prename;
    }

    public function getPrename(): string {
        return $this->authorPrename;
    }


    public static function all(): array{
        $gateway = new AuthorGateway();
        $authors = [];

        $dbAuthors = $gateway->All();

        foreach($dbAuthors as $dbauthor){
            $authors[] = self::create($dbauthor);
        }
        return $authors;

    }

     private static function create(array $tmpAuthor): Author {
        $author = new Author();
        $author->authorKey = $tmpAuthor["authorKey"];
        $author->authorName = $tmpAuthor["authorName"];
        $author->authorPrename = $tmpAuthor["authorPrename"];
        return $author; 
    }
}