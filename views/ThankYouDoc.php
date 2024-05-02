<?php
require "BasicDoc.php";
class ThanksDoc extends BasicDoc {
    protected function showContent() {
        echo "<h2>Thank you!</h2>";
        echo "<p>Your message has been sent. I will get back to you as soon as possible.</p>";
    }

    public function show() {
        $this->showContent(); 
    }
}
?>