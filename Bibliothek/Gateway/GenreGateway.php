<?php

namespace Bibliothek\Gateway;

class GenreGateway extends BasicTableGateway {
    protected string $table = "genre";
    protected string $primary = "genreKey";
}