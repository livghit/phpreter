<?php

use Livghit\Phpreter\Lexer;
use Livghit\Phpreter\Token;

test('Lexer works just fine :D', function () {
    $input = <<<'EOT'
let five = 5;
let ten = 10;

let add = fn(x, y) {
  x + y;
};

let result = add(five, ten);
EOT;

    $expectation = [
        ['token' => Token::LET],
        ['token' => Token::IDENT],
        ['token' => Token::ASSIGN],
        ['token' => Token::INT],
        ['token' => Token::SEMICOLON],
        ['token' => Token::LET],
        ['token' => Token::IDENT],
        ['token' => Token::ASSIGN],
        ['token' => Token::INT],
        ['token' => Token::SEMICOLON],
        ['token' => Token::LET],
        ['token' => Token::IDENT],
        ['token' => Token::ASSIGN],
        ['token' => Token::FUNCTION],
        ['token' => Token::LPAREN],
        ['token' => Token::IDENT],
        ['token' => Token::COMMA],
        ['token' => Token::IDENT],
        ['token' => Token::RPAREN],
        ['token' => Token::LBRACE],
        ['token' => Token::IDENT],
        ['token' => Token::PLUS],
        ['token' => Token::IDENT],
        ['token' => Token::SEMICOLON],
        ['token' => Token::RBRACE],
        ['token' => Token::SEMICOLON],
        ['token' => Token::LET],
        ['token' => Token::IDENT],
        ['token' => Token::ASSIGN],
        ['token' => Token::IDENT],
        ['token' => Token::LPAREN],
        ['token' => Token::IDENT],
        ['token' => Token::COMMA],
        ['token' => Token::IDENT],
        ['token' => Token::RPAREN],
        ['token' => Token::SEMICOLON],
        ['token' => Token::EOF],
    ];

    $lexer = new Lexer($input);

    foreach ($expectation as $expected) {
        $token = $lexer->NextToken();

        expect($token)->toBe($expected['token']);
        expect($token->value)->toBe($expected['token']->value);
    }
});
