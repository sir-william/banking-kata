<?php

/**
 * @package swkberlin
 * @author moudni Salaheddine <moudni.salaheddine@gmail.com>
 */
namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\Account;

require __DIR__ . '/../vendor/autoload.php';

class AccountTest extends TestCase
{

    /**
     * test deposit
     */
     public function testDeposit(): void
    {
        $account = new Account();
        $oldBalance = $account->getBalance();
        $expected = $oldBalance + 500;
        $account->deposit(500);
        $this->assertEquals($expected,$account->getBalance());
    }

    /**
     * test withdraw of statement
     */
    public function testWithdraw(): void
    {
        $account = new Account();
        $oldBalance = $account->getBalance();
        $expected = $oldBalance - 100;
        $account->withdraw(100);
        $this->assertEquals($expected,$account->getBalance());
    }

    /**
     * test PrintStatement
     */
    public function testPrintStatement(): void
    {
        $expected = sprintf("%s" . "    " . "%s" . "     " . "%s", 'Date', 'Amount', 'Balance' . "\n");
        $account = new Account();
        $account->deposit(500);
        $account->withdraw(100);
        $statements = $account->printStatement();
        echo $statements;
        $AllStatements = $account->getStatement();
        foreach ($AllStatements as $item) {
            $expected .= sprintf("%s" . "    " . "%s" . "     " . "%s\n", $item[0], $item[1], $item[2]);
        }

         $this->expectOutputString($expected);

    }



}
