<?php
class HtmlDoc {
    private function showHtmlStart() {
        echo"<!DOCTYPE html>";
        echo "<html lang='en'>";
    }

    private function showHtmlEnd() {
        echo "</html>";
    }

    private function showHeadStart() {
        echo "<head>";
    }

    //todo
    protected function showHeadContent() {
        echo "";
    }

    private function showHeadEnd() {
        echo "</head>";
    }

    private function showBodyStart() {
        echo "<body>";
    }

    //todo
    protected function showBodyContent() {
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
}//this->$data

//
?>