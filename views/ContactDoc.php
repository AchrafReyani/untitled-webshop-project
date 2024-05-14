<?php
include_once 'FormsDoc.php';
class ContactDoc extends FormsDoc {
  protected function showContent() {
    $this->showFormStart("Contact Me", "If you have any questions or comments, please feel free to contact me using the form below.", "index.php", "POST");
    $this->showHiddenField("page", "Contact");
    $this->showSelectField("pronouns","Pronouns", "Please select a pronoun", ["He/Him","She/Her","They/Them","Prefer not to say","Other"]);
    $this->showTextField("name", "Name");
    $this->showTextField("email", "Email");
    $this->showTextField("phonenumber", "Phone number");
    $this->showTextField("street", "Street");
    $this->showTextField("housenumber", "House number");
    $this->showTextField("postalcode", "Postal code");
    $this->showTextField("city", "City");
    $this->showRadioField("Please select a communication method.","communication",["phone","email","postal"]);
    $this->showTextField("message", "Message");
    $this->showFormEnd();
    }
}
?>