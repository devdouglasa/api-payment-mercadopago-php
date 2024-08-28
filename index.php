<?php

require __DIR__ . '/vendor/autoload.php';
// require __DIR__ . '/src/MercadoPago.php';

use App\Services\Connection;
use App\Services\User;
use App\MercadoPago;


$transaction = new MercadoPago();

$payment = $transaction->paymentPreference();

var_dump($payment);


// $conn = new BancoDeDados();

// $user = new User(20, 'Cássia', 25, 'cassiamaria@gmail.com');

// $conn->delete($user);


// $conn->update($user);

// $conn->add($user);

// $query = $conn->getAll();

// var_dump($query);
