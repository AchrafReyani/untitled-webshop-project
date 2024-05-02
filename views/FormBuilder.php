<?php   //TODO needs to be compatible with any type of form (login register contact ect)
abstract class FormBuilder {
    protected function showFormStart($title, $paragraph, $action, $method) {
        echo "<h2>".$title."</h2>
        <p>".$paragraph."</p>
        <form action=\"".$action."\" method=\"".$method."\">";
    }

    protected function showHiddenField($name, $value) {
        echo "<input name=\"".$name."\" value=\"".$value."\" type=\"hidden\">";
    }

    protected function showFormField() {
        echo "<div>
        <label for=\"$fieldName\">$label:</label>
        <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
        <span>* " . $data[$fieldName . "Error"]  . "</span>
        </div>";
    }

    //no arguments
    protected function showFormEnd() {
        echo "<div>
        <input type=\"submit\" value=\"Send\">
        </div>
        </form>";
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