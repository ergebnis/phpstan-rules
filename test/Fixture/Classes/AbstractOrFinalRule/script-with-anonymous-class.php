<?php

declare(strict_types=1);

$foo = new class() {
    public function __toString(): string
    {
        return 'Hmm';
    }
};
