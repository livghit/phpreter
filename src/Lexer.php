<?php

namespace Livghit\Phpreter;

/**
 * Lexer
 * */
class Lexer
{
    private string $input;

    private int $position;

    private int $readPosition = 0;

    private string $ch;

    public function __construct(string $input)
    {
        $this->input = $input;
        $this->readChar();
    }

    public function NextToken(): Token
    {
        $token = null;
        switch ($this->ch) {
            case '=':
                $token = Token::ASSIGN;
                break;
            case '+':
                $token = Token::PLUS;
                break;
            case '(':
                $token = Token::LPAREN;
                break;
            case ')':
                $token = Token::RPAREN;
                break;
            case '{':
                $token = Token::LBRACE;
                break;
            case '}':
                $token = Token::RBRACE;
                break;
            case ',':
                $token = Token::COMMA;
                break;
            case ';':
                $token = Token::SEMICOLON;
                break;
            case 0:
                $token = Token::EOF;
                break;
            default:
                if ($this->isLetter($this->ch)) {
                    return $this->readIdentifier();
                }

                return Token::ILLEGAL;
                break;
        }

        $this->readChar();

        return $token;
    }

    private function readChar()
    {
        if ($this->readPosition >= strlen($this->input)) {
            $this->ch = 0;
        } else {
            $this->ch = $this->input[$this->readPosition];
        }

        $this->position = $this->readPosition;
        $this->readPosition += 1;
    }

    private function isLetter(string $ch)
    {
        $c = $ch[0];

        return $c >= 'a' && $c <= 'z' || $c >= 'A' && $c <= 'Z' || $c == '_';
    }

    private function readIdentifier()
    {
        $position = $this->position;
        while ($this->isLetter($this->ch)) {
            $this->readChar();
        }

        return substr($this->input, $position, $this->position - $position);
    }
}
