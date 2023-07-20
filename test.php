<?php
require_once 'classes/System.php';

$system = new System();

class Person
{
  private $name;
  private $age;

  function __construct($name, $age)
  {
    $this->name = $name;
    $this->age = $age;
  }

  function getName()
  {
    return $this->name;
  }

  function setName($name)
  {
    $this->name = $name;
  }

  function getAge()
  {
    return $this->age;
  }

  function setAge($age)
  {
    $this->age = $age;
  }
}

function compare($a, $b)
{
  $aAge = $a->getAge();
  $bAge = $b->getAge();
  if ($aAge === $bAge) return 0;
  return ($aAge < $bAge) ? 1 : -1;
}

$person1 = new Person("Edu", 30);
$person2 = new Person("Felipe", 22);
$person3 = new Person("Zag", 27);
$person4 = new Person("Brock", 42);
$person5 = new Person("Grand Brock", 50);

$array = [
  $person1, $person2, $person3, $person4
];

echo '<pre>';
var_dump(array_slice($array, 0, 3));
echo '</pre>';

$array[] = $person5;
usort($array, "sortPeople");

echo '<pre>';
var_dump(array_slice($array, 0, 3));
echo '</pre>';
