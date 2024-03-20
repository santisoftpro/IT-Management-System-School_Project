<?php
require './connect.php';
class Borrow
{
    public $borrow;
    public $returned;
    public function borrowerItem($borrowedDate, $reternedDate)
    {
        $this->borrow = $borrowedDate;
        $this->returned = $reternedDate;
        $query = "SELECT * FROM borrow WHERE ";
    }

}