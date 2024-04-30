<?php
class HtmlDoc {
    private function showHtmlStart() {
        echo"<html>";
    }

    private function showHtmlEnd() {
        echo "</html>";
    }

    private function showHeadStart() {
        echo "<head>";
    }

    //todo
    private function showHeadContent() {
        echo "";
    }

    private function showHeadEnd() {
        echo "</head>";
    }

    private function showBodyStart() {
        echo "<body>";
    }

    //todo
    private function showBodyContent() {
        echo "";
    }
    
    private function showBodyEnd() {
        echo "</body>";
    }

    public function show() {
        $this->showHtmlStart();
        $this->showHeadStart();
        $this->showHeadContent();
        $this->showHeadEnd();
        $this->showBodyStart();
        $this->showBodyContent();
        $this->showBodyEnd();
        $this->showHtmlEnd();
    }
}
?>