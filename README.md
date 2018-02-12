mastermind-solver-php
=====================

PHP CLI program for solving the popular strategy board game, [Mastermind](https://en.wikipedia.org/wiki/Mastermind_(board_game)).

# Installation

Download the required packages using [Composer](https://getcomposer.org).

```
$ composer install
```

# Usage

```
$ php bin/mastermind.php

```

# Example Game Play

```
$ php bin/mastermind.php 

Play this guess (1296): Yellow, Orange, White, Purple
How many reds? 0
How many whites? 2
Play this guess (312): White, White, Yellow, White
How many reds? 1
How many whites? 0
Play this guess (114): White, Green, Purple, Pink
How many reds? 0
How many whites? 3
Play this guess (14): Orange, White, Pink, Green
How many reds? 1
How many whites? 1
Play this guess (5): Purple, Pink, Yellow, Green
How many reds? 0
How many whites? 2
Play this guess (1): Pink, Purple, Pink, White
How many reds? 4
How many whites? 0
Hooray! We won!

```