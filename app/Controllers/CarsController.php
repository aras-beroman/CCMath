<?php

namespace App\Controllers;


use App\Lib\Request;
use App\Controllers\ResponseController;
use App\Lib\Response;
use App\Models\Cars;

class CarsController extends Response
{

    public function index($groupBy = false)
    {
        if ($groupBy) {
            $cars = (new Cars())->groupBy('brand');

        } else {
            $cars = (new Cars())->query("SELECT * FROM cars ORDER BY brand ASC");
        }

        return $cars;
    }

    public function store(Request $request)
    {
        foreach ($request->all() as $key => $input) {
            if (strlen($request->all()[$key]) == 0) {
                return $this->sendError("All fields are required",500);
            }
        }
        $result = (new Cars())->insert($request->all());


        if (is_string($result) && strpos($result, 'Error') !== false) {
            return $this->sendError($result);
        }

        if ($result) {
            return $this->sendResponse($this->index('brand'));
        }
    }

    public function delete($id)
    {
        (new Cars())->delete($id);

        return $this->sendResponse($this->index('brand'));
    }
}