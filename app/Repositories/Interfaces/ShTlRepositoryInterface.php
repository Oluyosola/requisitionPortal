<?php
namespace App\Repositories\Interfaces;

interface ShTlRepositoryInterface{
    public function getRequisition($sh_tl);
    
    public function getApproval($sh_tl);
    public function getRejected($sh_tl);
    
}