<?php


namespace Firebit\Laravel\ApiResponse;


class ApiResponseTypes
{
    /**
     * @param null $data
     * @param int $status_code
     * @return ApiResponse
     */
    static public function success($data = null, int $status_code = ApiResponseCode::HTTP_SUCCESS){
        $response = ApiResponse::create($data, $status_code);
        return $response;
    }

    /**
     * @param $data
     * @param int $status_code
     * @return ApiResponse
     */
    static public function fail($data, int $status_code = ApiResponseCode::HTTP_ERROR_CLIENT_NOT_ACCEPTABLE){
        $response = ApiResponse::create($data, $status_code);
        return $response;
    }

    /**
     * @param $message
     * @param int $status_code
     * @return ApiResponse
     */
    static public function error($message, int $status_code = ApiResponseCode::HTTP_ERROR_SERVER_INTERNAL){
        $response = ApiResponse::create(null, $status_code);
        $response->setErrorMessage($message);
        return $response;
    }
}
