<?php

namespace Bibliothek\Gateway;

class BookGenreGateway extends BasicTableGateway {
    protected string $table = "bookGenre";
    protected string $primary = "bookGenreKey";
}