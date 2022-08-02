<?php
namespace App\Repositories\Interfaces;

interface StoreRepositoryInterface{
    public function getStoreApproval();
    public function getProcessed();    
}