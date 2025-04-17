<?php

// ViewInterface.php (Interface for Views)
interface ViewInterface {
    public function render(array $data): string;
}