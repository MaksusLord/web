<?php

/**
 * Class NumbersSquared
 * Implements the Iterator interface to iterate through a sequence of numbers and return their squares.
 */
class NumbersSquared implements Iterator {
    private int $start;
    private int $end;
    private int $current;

    /**
     * NumbersSquared constructor.
     * @param int $start The starting number of the sequence.
     * @param int $end   The ending number of the sequence.
     */
    public function __construct(int $start, int $end) {
        $this->start = $start;
        $this->end = $end;
        $this->current = $start;
    }

    /**
     * Rewinds the iterator to the beginning.
     *
     * @return void
     */
    public function rewind(): void {
        $this->current = $this->start;
    }

    /**
     * Checks if the current position is valid.
     *
     * @return bool
     */
    public function valid(): bool {
        return $this->current <= $this->end;
    }

    /**
     * Moves the current position to the next element.
     *
     * @return void
     */
    public function next(): void {
        $this->current++;
    }

    /**
     * Returns the key of the current element.
     *
     * @return mixed
     */
    public function key(): mixed {
        return $this->current;
    }

    /**
     * Returns the current element (the square of the current number).
     *
     * @return mixed
     */
    public function current(): mixed {
        return $this->current * $this->current;
    }
}

// Create an instance of the NumbersSquared class
$obj = new NumbersSquared(3, 7);

// Iterate through the object using a foreach loop
foreach ($obj as $num => $square) {
    echo "Квадрат числа $num = $square\n";
}

?>