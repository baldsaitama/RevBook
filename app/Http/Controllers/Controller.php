<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function respondWithData($data, $headers = [])
    {
        if (!is_array($data) && $data) {
            $data = ['success' => true, 'status_code' => $this->getStatusCode()] + $data->toArray();
        } else {
            $data = ['success' => true, 'status_code' => $this->getStatusCode()] + $data;
        }
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
