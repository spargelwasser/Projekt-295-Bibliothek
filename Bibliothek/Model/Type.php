<?php

namespace Bibliothek\Model;

use Bibliothek\Gateway\TypeGateway;

class Type {

    private int $typeKey = 0;
    private string $typeName;

    public function getKey(): int {
        return $this->typeKey;
    }

    public function setName(string $name): void {
        $this->typeName = $name;
    }

    public function getName(): string {
        return $this->typeName;
    }

    public static function all(): array{
        $gateway = new TypeGateway();
        $types = [];

        $dbtypes = $gateway->all();

        foreach($dbtypes as $dbType){
            $types[] = self::create($dbType);
        }

        return $types;

    }

     private static function create(array $tmpType): Type {
        $type = new Type();
        $type->typeKey = $tmpType["typeKey"];
        $type->typeName = $tmpType["typeName"];
        return $type;
    }
}