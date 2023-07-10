<?php
require_once '../../classes/System.php';

$system = new System();

$email = $_POST['email'];
$password = $_POST['password'];

$response = $system->authUser($email, $password);

if ($response[0] === false) {
  setcookie('loginError', $response[1], time() + 2, '/ifet-sistema-avaliacao-de-filmes/login.php');
  header('Location: ../../login.php');
  exit();
}

session_start();

$_SESSION['userId'] = $response[1]['id'];
$_SESSION['userEmail'] = $response[1]['email'];

header('Location: ../../test.php');
