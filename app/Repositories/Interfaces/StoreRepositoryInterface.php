<?php
namespace App\Repositories\Interfaces;

interface StoreRepositoryInterface{
    public function getStoreApproval($store);
    public function getApproved($store);
    public function getRejected($store);
    
}