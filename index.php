<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>php-oop-dipendenti</title>
  </head>
  <body>

    <h2 class="container">

      <?php

      class Person {
        private $name;
        private $lastname;
        private $dateOfBirth;

        public function __construct($name, $lastname, $dateOfBirth) {
          $this -> setName($name);
          $this -> setLastname($lastname);
          $this -> setDateOfBirth($dateOfBirth);
        }
        public function getName() {
          return $this -> name;
        }

        public function setName($name) {
          if (getType($name) == "string") {
					  $this -> name = $name;
				  }
        }

        public function getLastname() {
          return $this -> lastname;
        }

        public function setLastname($lastname) {
          if (getType($lastname) == "string") {
					  $this -> lastname = $lastname;
				  }
        }

        public function getDateOfBirth() {
          return $this -> dateOfBirth;
        }

        public function setDateOfBirth($dateOfBirth) {
          $this -> dateOfBirth = $dateOfBirth;
        }

        public function __toString() {
          return
              "Nome: " . $this -> getName() . "<br>"
              . "Cognome: " . $this -> getLastname() . "<br>"
              . "Data di nascita: " . $this -> getDateOfBirth();
        }
      }

      class Staff extends Person {

        private $jobTitle;
        private $salary;

        public function __construct($name, $lastname, $dateOfBirth, $jobTitle, $salary) {

          parent::__construct($name, $lastname, $dateOfBirth);

          $this -> setJobTitle($jobTitle);
          $this -> setSalary($salary);
        }

        public function getJobTitle() {
          return $this -> jobTitle;
        }

        public function setJobTitle($jobTitle) {
          $this -> jobTitle = $jobTitle;
        }

        public function getSalary() {
          return $this -> salary;
        }

        public function setSalary($salary) {
          if (getType($salary) == "integer") {
					  $this -> salary = $salary;
				  }
        }

        public function __toString(){
          return parent::__toString() . "<br>"
          . "Qualifica : " . $this -> getJobTitle() . "<br>"
          . "Stpendio(€) : " . $this -> getSalary();
        }

      }

      class Boss extends Staff {

        private $responsibility;

        public function __construct($name, $lastname, $dateOfBirth, $jobTitle, $salary, $responsibility ) {

          parent::__construct($name, $lastname, $dateOfBirth, $jobTitle, $salary);

          $this -> setResponsibility($responsibility);
        }

        public function getResponsibility() {
          return $this -> responsibility;
        }

        public function setResponsibility($responsibility) {
          $this -> responsibility = $responsibility;
        }

        public function __toString(){
          return parent::__toString() . "<br>"
          . "Responsabile area : " . $this -> getResponsibility() . "<br>";
        }

      }

      ?>
      <div class="container">

      <?php

        $person = new Person("Paolo", "Bitta", "21/03/1962");

        echo $person;

        ?>
      </div>
      <div class="container">
        <?php

        $staff = new Staff("Luca", "Nervi", "25/05/1968", "Impegato", 1200);

        echo $staff;

         ?>
      </div>
      <div class="container">
        <?php

        $boss = new Boss ("Guido", "Geller", "03/11/1959", "Dirigente", 3500, "Risorse umane");

        echo $boss;

         ?>
      </div>

    </h2>

  </body>
</html>
