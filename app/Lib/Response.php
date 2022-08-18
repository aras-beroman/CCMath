<?php

namespace App\Lib;

class Response
{
    private $status = 200;

    public function status(int $code)
    {
        $this->status = $code;

        return $this;
    }

    public function sendError($error, $code = 500)
    {
        http_response_code($code);
        header('Content-Type: application/json');

        $response = [
            'success' => false,
            'message' => $error,
        ];


        echo json_encode($response);
    }

    public function sendResponse($data = array(), $message = 'Action completed succesfully')
    {
        http_response_code($this->status);
        header('Content-Type: application/json');

        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];

        echo json_encode($response);
    }
}