<?php

// MarkdownView.php (View)
require_once 'ViewInterface.php';

class MarkdownView implements ViewInterface {
    public function render(array $data): string {
        $output = "# User Information <br><br>";

        foreach ($data as $user) {
            if ($user instanceof User) {
                $output .= "## " . $user->getName() . "<br><br>";
                $output .= "* **Role:** " . $user->getRole() . "<br>";
                $output .= "* **Email:** " . $user->getEmail() . "<br><br>";
            }
        }

        return $output;
    }
}