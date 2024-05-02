<?php   //TODO
abstract class FormBuilder {
    protected function showFormStart($title, $paragraph, $action, $method) {
        echo "<h2>".$title."</h2>
        <p>".$paragraph."</p>
        <form action=\"".$action."\" method=\"".$method."\">";
    }

    protected function showHiddenField() {
        echo "<input name=\"page\" value=\"Contact\" type=\"hidden\">";
    }

    protected function showFormField() {

    }

    protected function showFormEnd() {

    }

    private function inputField() {

    }

    private function selectField() {

    }

    private function radioField() {

    }

    private function textAreaField() {

    }

    //Is this necessary? (probably not)
    public function show() {

    }

}
?>