<?php

namespace Bibliothek\Gateway;

class AuthorGateway extends BasicTableGateway {
    protected string $table = "author";
    protected string $primary = "authorKey";
}