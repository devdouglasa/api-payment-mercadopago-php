<?php

require __DIR__ . '/vendor/autoload.php';

use App\Services\Connection;
use App\Services\User;
use App\MercadoPago;
use Dotenv\Dotenv;

## READ .ENV FILE
$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

## API PAYMENT MERCADO PAGO
$transaction = new MercadoPago();

$payment = $transaction->paymentPreference();

## VIEW HTML
echo "<h1>Acesse o Link para realizar o pagamento!</h1>";

echo "<button><a href='$payment'>Link de Pagamento</a></button>";

// var_dump($payment);


// $conn = new BancoDeDados();

// $user = new User(20, 'Cássia', 25, 'cassiamaria@gmail.com');

// $conn->delete($user);


// $conn->update($user);

// $conn->add($user);

// $query = $conn->getAll();

// var_dump($query);
