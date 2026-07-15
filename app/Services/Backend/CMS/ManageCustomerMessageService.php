<?php

namespace App\Services\Backend\CMS;

use App\Models\CustomerQuery;
use Exception;
use Illuminate\Support\Collection;

class ManageCustomerMessageService
{
    const SWW = "Something went wrong";

    public function getMessages(): Collection
    {
        try{
            return CustomerQuery::with(['project:id,name', 'service:id,title'])
                ->select('id', 'project_id', 'service_id', 'name', 'email', 'phone', 'message', 'created_at')
                ->orderBy('id', 'desc')
                ->get();
        }catch(Exception $e){
            throw new Exception(self::class, 500);
        }
    }
}
