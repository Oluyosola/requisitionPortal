<?php
namespace App\Repositories\Interfaces;

interface ManagerRepositoryInterface{
    public function getManagerApproval($manager);
    public function getApproved($manager);
    public function getRejected($manager);
    
}