<?php
require 'vendor/autoload.php';

use Web3\Web3;

// Define the Ganache RPC URL
$ganacheUrl = 'http://127.0.0.1:7545';
$web3 = new Web3($ganacheUrl);

// Check if the connection is successful
$web3->eth->blockNumber(function ($err, $blockNumber) {
    if ($err !== null) {
        echo 'Error connecting to Ganache: ' . $err->getMessage();
        return;
    }
    echo 'Connected to Ganache! Current block number: ' . $blockNumber;
});
?>
