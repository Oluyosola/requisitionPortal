<?php
namespace App\Repositories\Interfaces;

interface StoreRepositoryInterface{
    public function getStoreApproval($store);
    public function getProcessed($store);    
}