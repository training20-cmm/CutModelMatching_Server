<?php

use App\Http\Response;

class ResponseConvertService {

    public function convert($eloquentOrArray, $responseClass) {
        if (is_array($eloquentOrArray)) {
            return array_map(function($eloquent) {
                return _convert($eloquent, $responseClass);
            }, $eloquentOrArray);
        } else {
            return _convert($eloquentOrArray, $responseClass);
        }
    }

    public function _convert($eloquent, $responseClass): Response {
        $response = new $responseClass();
        $response->constructWith($eloquentOrArray);
        return $response;
    }
}
