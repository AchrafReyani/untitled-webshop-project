<?php
include_once 'FormBuilder.php';
class ContactDoc extends FormBuilder {
 
      //replace this function with the formbuilder functions
      //right now this also has the logic for which errors to display, should probably not be here
      private function showFormFieldTemp($fieldName, $label, $options = NULL) {
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

    protected function showContent() {
        $this->showFormStart("Contact Me", "If you have any questions or comments, please feel free to contact me using the form below.", "index.php", "POST");
        $this->showHiddenField("page", "Contact");
        $this->showFormFieldTemp("pronouns", "Pronouns", 'PRONOUN');
        $this->showFormFieldTemp("name", "Name",NULL); 
        $this->showFormFieldTemp("email", "Email", NULL); 
        $this->showFormFieldTemp("phonenumber", "Phone number", NULL);
        $this->showFormFieldTemp("street", "Street", NULL); 
        $this->showFormFieldTemp("housenumber", "House number",NULL);
        $this->showFormFieldTemp("postalcode", "Postal code", NULL);
        $this->showFormFieldTemp("city", "City", NULL); 
        $this->showFormFieldTemp("communication", "Communication method", 'COMMUNICATION');
        $this->showFormFieldTemp("message", "Message",NULL); 
        $this->showFormEnd();
    }
}
?>