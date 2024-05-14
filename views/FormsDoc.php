<?php
include_once "BasicDoc.php";
abstract class FormsDoc extends BasicDoc {
    public function showFormStart($title, $paragraph, $action, $method) {
        echo "<h2>".$title."</h2>
        <p>".$paragraph."</p>
        <form action=\"".$action."\" method=\"".$method."\">";
    }

    public function showHiddenField($name, $value) {
        echo "<input name=\"".$name."\" value=\"".$value."\" type=\"hidden\">";
    }

    public function showTextField($fieldName, $label) {
        echo "<div>
        <label for=\"$fieldName\">$label:</label>
        <input type=\"text\" name=\"$fieldName\" value=\"". $this->data[$fieldName]."\">
        <span>* " . $this->data[$fieldName . "Error"]  . "</span>
        </div>";
    }

    //no arguments
    public function showFormEnd() {
        echo "<div>
        <input type=\"submit\" value=\"Send\">
        </div>
        </form>";
    }

    public function showSelectField($fieldName, $label, $default, $options) {
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

    public function showRadioField($text, $name, $options) {
        echo "<div><p>".$text."</p>";
        foreach ($options as $option) {
            $optionId = lcfirst($option) . "-"."$name"; // Generate unique ID for each radio button
            echo "<label for=\"$optionId\">".$option."</label>";
            echo "<input type=\"radio\" id=\"$optionId\" name=\"$name\" value=\"$method\">";
        }
        //todo error message?
        echo "</div>";
    }

    //todo need to write seperate error handling for the form fields elsewhere and then remove this function and call generic functions from the formsdoc
    public function showFormFieldTemp($fieldName, $label, $options = NULL) {
        if ($options == NULL) {
          echo "
          <div>
          <label for=\"$fieldName\">$label:</label>
          <input type=\"text\" name=\"$fieldName\" value=\"". $this->data[$fieldName]."\">
          <span>* " . $this->data[$fieldName . "Error"]  . "</span>
          </div>";
        } else if ($options == 'PRONOUN') {
            echo "
            <div>
            <label for=\"$fieldName\">$label:</label>
            <select name=\"$fieldName\" value=\"". $this->data[$fieldName]."\">
            <option value=\"\">Please select a pronoun</option>
            <option value=\"he/him\" ". ($this->data[$fieldName] == "he/him" ? "selected=\"selected\"" : "").">He/him</option>
            <option value=\"she/her\" " . ($this->data[$fieldName] == "she/her" ? "selected=\"selected\"" : "").">She/her</option>
            <option value=\"they/them\" ". ($this->data[$fieldName] == "they/them" ? "selected=\"selected\"" : "").">They/them</option>
            <option value=\"other\" ". ($this->data[$fieldName] == "other" ? "selected=\"selected\"" : "").">Other</option>
            <option value=\"prefer not to say\" ". ($this->data[$fieldName] == "prefer not to say" ? "selected=\"selected\"" : "").">Prefer not to say</option>
            </select>
            <span>* " . $this->data[$fieldName . "Error"]  . "</span>
            </div>
            ";
          } else if ($options == 'COMMUNICATION') {
            $communicationmethod = ["email", "phone", "postal"];
            echo "<div><p>Preferred Communication Method:</p>";
            foreach ($communicationmethod as $method) {
            $methodId = lcfirst($method) . "-communication"; // Generate unique ID for each radio button
            echo "
            <label for=\"$methodId\">$method</label>
            <input type=\"radio\" id=\"$methodId\" name=\"communication\" value=\"$method\" " . ($this->data["communication"] == $method ? "checked" : "") . ">
            ";
            }
          echo "<span>* ". $this->data[$fieldName . "Error"] ."</span>";
          echo "</div>";
        }
      }
}
?>