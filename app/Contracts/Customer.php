<?php

namespace App\Contracts;

interface Customer
{
    public function getCartAttribute();
    public function getCartIdsAttribute();
    public function checkout();
}
