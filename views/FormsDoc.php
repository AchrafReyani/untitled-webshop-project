<?php
include_once "BasicDoc.php";
abstract class FormsDoc extends BasicDoc {
    protected function showFormStart($title, $paragraph, $action, $method) {
        echo "<h2>".$title."</h2>
        <p>".$paragraph."</p>
        <form action=\"".$action."\" method=\"".$method."\">";
    }

    protected function showHiddenField($name, $value) {
        echo "<input name=\"".$name."\" value=\"".$value."\" type=\"hidden\">";
    }

    protected function showTextField($fieldName, $label) {
        echo "<div>
        <label for=\"$fieldName\">$label:</label>
        <input type=\"text\" name=\"$fieldName\" value=\"". $this->model->{$fieldName}."\">
        <span>* " . $this->model->{$fieldName . "Error"}  . "</span>
        </div>";
    }

    protected function showFormEnd($page) {
        $this->showHiddenField('page', $page);
        echo "<div>
        <input type=\"submit\" value=\"Send\">
        </div>
        </form>";
    }

    protected function showSelectField($fieldName, $label, $default, $options) {
        echo "<div>
            <label for=\"$fieldName\">$label:</label>
            <select name=\"$fieldName\" value=\"\">
            <option value=\"\">".$default."</option>";
            foreach ($options as $option) {
                echo "<option value=".$option.">".$option."</option>";
            }
            //todo error? and no value?
            echo "</div>";
    }

    protected function showRadioField($text, $name, $options) {
        echo "<div><p>".$text."</p>";
        foreach ($options as $option) {
            $optionId = lcfirst($option) . "-"."$name"; // Generate unique ID for each radio button
            echo "<label for=\"$optionId\">".$option."</label>";
            echo "<input type=\"radio\" id=\"$optionId\" name=\"$name\" value=\"$option\">";
        }
        //todo error message?
        echo "</div>";
    }  
}
?>