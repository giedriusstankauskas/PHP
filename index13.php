<?php ini_set('display_errors','1');
  class Human {
    public $name = 'Vardenis';
    public $surname = 'Pavardenis';

    public function ahoy() {
      return 'Hello, ' . $this -> name  . ' ' . $this -> surname . '<br>';
    }
  }

  $Petras = new Human();
  $Jonas = new Human();

  $Petras -> name = 'Petras';
  $Jonas -> name = 'Jonas';

  $Petras -> surname = 'Petraitis';
  $Jonas -> surname = 'Jonaitis';

  echo $Petras -> ahoy();
  echo $Jonas -> ahoy();
?>
