<?php

namespace Bibliothek\Gateway;

class TypeGateway extends BasicTableGateway {
    protected string $table = "type";
    protected string $primary = "typeKey";
}