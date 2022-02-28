<?php
namespace swkberlin;

use \DateTime;

/**
 * Class Account
 * @package swkberlin
 * @author moudni Salaheddine <moudni.salaheddine@gmail.com>
 */
class Account
{
    /**
     * @var int
     */
    public  $balance ;

    /**
     * @var
     */
    public  $date;

    /**
     * @var array
     */
    public $statement= [];


    /**
     * Account constructor.
     */
    public function __construct()
    {
        $this->balance = 0;
        $today = new DateTime();
        $this->setDate($today);

    }

    /**
     * @param int $amount
     */
    public function deposit(int $amount): void
    {
        $account = new Account();
        $this->balance += $amount;
        $this->setBalance($this->balance) ;
        $this->setStatement([$this->getDate(),"+".$amount,$this->balance]);
    }

    /**
     * @param int $amount
     */
    public function withdraw(int $amount): void
    {
        $account = new Account();
        $this->balance -= $amount;
        $this->setBalance($this->balance) ;
        $this->setStatement([$this->getDate(),"-".$amount,$this->balance]);
    }

    /**
     * @return string
     */
    public function printStatement(): string
    {
        $outPut =  sprintf("%s"."    "."%s"."     "."%s\n",'Date','Amount','Balance');
        foreach ($this->getStatement() as $item){
            $outPut .= sprintf("%s"."    "."%s"."     "."%s\n",$item[0],$item[1],$item[2]);
        }
        return  $outPut;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     */
    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }
    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date->format('d.m.Y');
    }
    /**
     * @param DateTime $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }


    /**
     * @return array
     */
    public function getStatement(): array
    {
        return $this->statement;
    }

    /**
     * @param array $statement
     */
    public function setStatement(array $statement): void
    {
        $this->statement [] = $statement;
    }

}

