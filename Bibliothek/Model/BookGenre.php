<?php

namespace Bibliothek\Model;

use Bibliothek\Gateway\BookGenreGateway;

class BookGenre {
    private int $bookGenreKey = 0;
    private int $bookId;
    private int $genreId;

    public function getKey(): int {
        return $this->bookGenreKey;
    }

    public function setBookId(int $bookId): void {
        $this->bookId = $bookId;
    }

    public function getBookId(): int {
        return $this->bookId;
    }

    public function setGenreId(int $genreId): void {
        $this->genreId = $genreId;
    }

    public function getGenreId(): int {
        return $this->genreId;
    }

    public static function all(): array{
        $gateway = new BookGenreGateway();
        $bookGenre = [];

        $dbBookGenre = $gateway->all();

        foreach($dbBookGenre as $dbBookGenre ) {
            $bookGenre[] = self::create($dbBookGenre);
        }

        return $bookGenre;

    }

     private static function create(array $tmpBookGenre): BookGenre {
        $bookGenre = new BookGenre();
        $bookGenre->bookGenreKey = $tmpBookGenre["bookGenreKey"];
        $bookGenre->bookId = $tmpBookGenre["bookId"];
        $bookGenre->genreId = $tmpBookGenre["genreId"];
        return $bookGenre;
    }

    public function save() {
        $gateway = new BookGenreGateway();
        if($this->bookGenreKey > 0){
            $gateway->update($this->bookGenreKey, $this->getAttributesAsAsiArray());
        } else {
            $this->bookGenreKey = $gateway->insert($this->getAttributesAsAsiArray());
        }
    }

    private function getAttributesAsAsiArray() : array {
        return [
            "bookId"=> $this->bookId,
            "genreId"=> $this->genreId
        ];
    }
}