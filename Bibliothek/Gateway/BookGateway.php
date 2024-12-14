<?php

namespace Bibliothek\Gateway;

class BookGateway extends BasicTableGateway {
    protected string $table = "book";
    protected string $primary = "bookKey";
}