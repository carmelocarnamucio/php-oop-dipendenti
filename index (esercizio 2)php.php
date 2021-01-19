<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>php-oop-dipendenti 2</title>
  </head>
  <body>

    <h2 class="container">

      <?php

      class Person {
        private $name;
        private $lastname;
        private $dateOfBirth;
        private $securyLvl;

        public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
          $this -> setName($name);
          $this -> setLastname($lastname);
          $this -> setDateOfBirth($dateOfBirth);
          $this -> setSecuryLvl($securyLvl);
        }
        public function getName() {
          return $this -> name;
        }

        public function setName($name) {
          if (!(gettype($name) === "string" && strlen($name) > 3)) {
            throw new Exception ('il nome deve contenere almeno 3 caratteri');
          }
          $this-> name = $name;
        }

        public function getLastname() {
          return $this -> lastname;
        }

        public function setLastname($lastname) {
          if (!(gettype($lastname) === "string" && strlen($lastname) > 3)) {
            throw new Exception ('il cognome deve contenere almeno tre caratteri');
          }
          $this-> lastname = $lastname;
        }

        public function getDateOfBirth() {
          return $this -> dateOfBirth;
        }

        public function setDateOfBirth($dateOfBirth) {
          $this -> dateOfBirth = $dateOfBirth;
        }

        public function getSecuryLvl() {
          return $this -> securyLvl;
        }

        public function setSecuryLvl($securyLvl) {
				  if ($securyLvl != 0) {
            throw new Exception ('il livello di sicurezza deve essere zero');
				}
				  $this -> securyLvl = $securyLvl;
			  }

        public function __toString() {
          return
            "Nome: " . $this -> getName() . "<br>"
            . "Cognome: " . $this -> getLastname() . "<br>"
            . "Data di nascita: " . $this -> getDateOfBirth(). "<br>"
            . "Livello di sicurezza: "  . $this -> getSecuryLvl();
        }
      }

      class Employee extends Person {

        private $jobTitle;
        private $salary;

        public function __construct($name, $lastname, $dateOfBirth, $securyLvl, $jobTitle, $salary) {

          parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);

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

          if (get_class($this) === "Employee") {
            if ($salary < 10000) {
              throw new Exception ('valore non corretto');
            }
          } elseif (get_class($this) === "Boss") {
            if ($salary < 100000) {
              throw new Exception ('valore non corretto');
            }
          }
          $this -> salary = $salary;
		    }

        public function __toString(){
          return parent::__toString() . "<br>"
          . "Qualifica : " . $this -> getJobTitle() . "<br>"
          . "Stpendio(€) : " . $this -> getSalary();
        }

        public function getSecuryLvl() {
          return $this -> securyLvl;
        }

        public function setSecuryLvl($securyLvl) {
				  if ($securyLvl < 1 || $securyLvl > 5) {
					  throw new Exception ('il livello di sicurezza deve essere compreso da 1 a 5');
				  }
				  $this -> securyLvl = $securyLvl;
			  }

      }

      class Boss extends Employee {

        private $responsibility;
        private $employees;

        public function __construct($name, $lastname, $dateOfBirth, $securyLvl, $jobTitle, $salary, $responsibility, $employees = [] ) {

          parent::__construct($name, $lastname, $dateOfBirth, $securyLvl, $jobTitle, $salary);

          $this -> setResponsibility($responsibility);
          $this -> setEmployees($employees);
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

        public function getSecuryLvl() {
          return $this -> securyLvl;
        }

        public function setSecuryLvl($securyLvl) {
				  if ($securyLvl < 6 || $securyLvl > 10) {
					  throw new Exception ('il livello di sicurella deve essere da 6 a 10');
				  }
				  $this -> securyLvl = $securyLvl;
			  }

        public function getEmployees() {
				  return $this -> employees;
			  }

			  public function setEmployees($employees) {

  				if ($employees == [] || !is_array($employees)) {
  					throw new Exception ('il boss deve avere dei dipendenti');
  				}

				  $this -> employees = $employees;
			  }

      }

      ?>
      <div class="container">

      <?php

        try {

          $person = new Person("Paolo", "Bitta", "21/03/1962", 0);

          echo $person;

        } catch (Exception $e) {
            echo $e;
        }

      ?>
      </div>
      <div class="container">

      <?php

        try {

          $staff = new Employee("Luca", "Nervi", "25/05/1968", 1, "Impegato", 10000);

          echo $staff;

        } catch (Exception $e) {
            echo $e;
        }

      ?>
      </div>
      <div class="container">

      <?php

        try {

          $boss = new Boss ("Guido", "Geller", "03/11/1959", 10, "Dirigente", 100000, "Risorse umane", [$staff]);

          echo $boss;

        } catch (Exception $e) {
            echo $e;
        }

      ?>

      </div>

    </h2>

    <script src="script.js"></script>

  </body>
</html>
