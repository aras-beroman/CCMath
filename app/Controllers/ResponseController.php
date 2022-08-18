<?php

namespace App\Controllers;

class ResponseController
{
    public function sendResponse($result = array(), $message = 'Action completed succesfully')
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return json_encode($response);
    }

    public function sendError($error, $errorMessages = [], $debug_msg = '', $code = 500)
    {
        $response = [
            'success' => false,
            'message' => $error,
            'debug_msg' => $debug_msg
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return json_encode($response);
    }
}