# Building an interpreter using PHP 8.4

# Project requirements and details 

* Features:

- “C-like syntax
- variable bindings
- integers and booleans
- arithmetic expressions
- built-in functions
- first-class and higher-order functions
- closures
- a string data structure
- an array data structure
- a hash data structure”

* Syntax examples:
```js
let age = 1;
let name = "Monkey";
let result = 10 * (20 / 2);
let myArray = [1, 2, 3, 4, 5];
myArray[0]       // => 1
thorsten["name"] // => "Thorsten
let add = fn(a, b) { return a + b; };
let add = fn(a, b) { a + b; };
add(1, 2);

let fibonacci = fn(x) {
  if (x == 0) {
    0
  } else {
    if (x == 1) {
      1
    } else {
      fibonacci(x - 1) + fibonacci(x - 2);
    }
  }
};

let twice = fn(f, x) {
  return f(f(x));
};

let addTwo = fn(x) {
  return x + 2;
};

twice(addTwo, 2); // => 6
```


* Need to build : 
the lexer - Transforming statements into Tokens 
Ex ->
```js
let x = 5 + 5;

[
    LET,
    IDENTIFIER("x"),
    EQUAL_SING,
    INTEGER(5),
    PLUS_SING,
    INTEGER(5),
    SEMICOLUMN
]

```
the parser
the Abstract Syntax Tree (AST)
the internal object system
the evaluator
