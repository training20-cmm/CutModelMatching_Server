<?php

namespace App\Services;

use App\Http\Responses\Response;

class ResponseConvertService
{

    public function convert($eloquentOrArray, $responseClass)
    {
        if (is_array($eloquentOrArray)) {
            return array_map(function ($eloquent) use ($responseClass) {
                return $this->_convert($eloquent, $responseClass);
            }, $eloquentOrArray);
        } else {
            return $this->_convert($eloquentOrArray, $responseClass);
        }
    }

    public function _convert($eloquent, $responseClass): Response
    {
        $response = new $responseClass();
        $response->constructWith($eloquent);
        return $response;
    }
}
