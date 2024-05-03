<?php
require "BasicDoc.php";
class ThankYouDoc extends BasicDoc {
    protected function showContent($data) {
        echo "<h2>Thank you!</h2>";
        echo "<p>Your message has been sent. I will get back to you as soon as possible.</p>";
    }
}
?>