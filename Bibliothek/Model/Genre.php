<?php

namespace Bibliothek\Model;

use Bibliothek\Gateway\GenreGateway;

class Genre {

    private int $genreKey = 0;
    private string $genreName;

    public function getKey(): int {
        return $this->genreKey;
    }

    public function setName(string $name): void {
        $this->genreName = $name;
    }

    public function getName(): string {
        return $this->genreName;
    }

    public static function all(): array{
        $gateway = new GenreGateway();
        $genres = [];

        $dbgenres = $gateway->all();

        foreach($dbgenres as $dbGenre){
            $genres[] = self::create($dbGenre);
        }

        return $genres;

    }

     private static function create(array $tmpGenre): Genre {
        $genre = new Genre();
        $genre->genreKey = $tmpGenre["genreKey"];
        $genre->genreName = $tmpGenre["genreName"];
        return $genre;
    }

    public function save() {
        $gateway = new GenreGateway();
        if($this->genreKey > 0){
            $gateway->update($this->genreKey, $this->getAttributesAsAsiArray());
        } else {
            $this->genreKey = $gateway->insert($this->getAttributesAsAsiArray());
        }
    }

    private function getAttributesAsAsiArray() : array {
        return [
            "genreName"=> $this->genreName
        ];
    }

    public static function findById(int $id): ?Genre {
        $gateway = new GenreGateway();

        $tmpGenre = $gateway->findById($id);
        $genre = null;

        if( $tmpGenre ) {
            $genre = self::create($tmpGenre);
        }
        return $genre;
    }

    public function delete() {
        $gateway = new GenreGateway();
        $gateway->delete($this->genreKey);
    }
}