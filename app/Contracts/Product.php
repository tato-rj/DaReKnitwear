<?php

namespace App\Contracts;

interface Product
{
    public function inventory();
    public function supplier();
    public function unsold();
    public function sold();
    public function getUnshippedAttribute();
    public function getShippedAttribute();
    public function price($currency);
    public function images();
    public function reviews();
    public function getRatingAttribute();
}
