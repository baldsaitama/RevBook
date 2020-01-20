<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $statusCode = 200;
    function __construct()
    {

    }
    public function respond($data, $headers = [])
    {
        $data = $data + ['status_code' => $this->getStatusCode()];
        return response()->json($data, 200, $headers);
        // return response()->json($data, $this->getStatusCode(), $headers); for dynamic status code
    }
    protected function respondWithData($data, $headers = [])
    {
        if (!is_array($data) && $data) {
            $data = ['success' => true, 'status_code' => $this->getStatusCode()] + $data->toArray();
        } else {
            $data = ['success' => true, 'status_code' => $this->getStatusCode()] + $data;
        }
        return response()->json($data, $this->getStatusCode(), $headers);
    }
    protected function respondWithError($message)
    {
        return $this->respond([
            'success' => false,
            'message' => $message,
        ]);
    }
    protected function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)
            ->respond([
                'message' => $message,
                'success' => true,
            ]);
    }
    protected function respondSuccess($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)
            ->respond([
                'success' => true,
                'message' => $message,
            ]);
    }
    protected function respondNoContent($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NO_CONTENT)
            ->respond([
                'success' => false,
                'message' => $message,
            ]);
    }

    protected function respondNotFound($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)
            ->respond([
                'success' => false,
                'message' => $message,
            ]);
    }
    protected function respondInvalidCredentials($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_FORBIDDEN)
            ->respond([
                'success' => false,
                'message' => $message,
            ]);
    }
    protected function respondUnprocessableEntity($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
            ->respond([
                'success' => false,
                'message' => $message,
            ]);
    }
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

}
