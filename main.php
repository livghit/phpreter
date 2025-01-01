<?php

require __DIR__.'/vendor/autoload.php';

use Livghit\Phpreter\Lexer;

$lexer = new Lexer;
echo $lexer->hello();
