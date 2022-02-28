<?php

/**
 * @package swkberlin
 * @author moudni Salaheddine <moudni.salaheddine@gmail.com>
 */

namespace swkberlin;

use swkberlin\Account;

require __DIR__ . '/../vendor/autoload.php';

//print example statement would
$account = new Account();
$account->deposit(500);
$account->withdraw(100);
echo $account->printStatement();

