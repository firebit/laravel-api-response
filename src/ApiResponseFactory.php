<?php


namespace Firebit\Laravel\ApiResponse;


class ApiResponseFactory
{
    // Success (200 - 299)

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     * 
     * @return ApiResponse
     */
    static public function success($content = 'Operation was successful', int $status = ApiResponseCode::HTTP_SUCCESS, array $headers = array()) {
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     * 
     * @return ApiResponse
     */
    static public function created($content = 'Resource has been created', int $status = ApiResponseCode::HTTP_SUCCESS_CREATED, array $headers = array()) {
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     *
     * @return ApiResponse
     */
    static public function accepted($content = 'The request has been accepted', int $status = ApiResponseCode::HTTP_SUCCESS_ACCEPTED, array $headers = array()) {
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    // Redirection (300 - 399)

    /**
     * @param string location
     * @param string $content
     * @param int $status
     * @param array $headers
     *
     * @return ApiResponse
     */
    static public function redirectPermanent(string $location, $content = 'The resource has permanently been moved', int $status = ApiResponseCode::HTTP_REDIRECT_PERMANENT, array $headers = array()) {
        $headers['Location'] = $location;

        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    /**
     * @param string location
     * @param string $content
     * @param int $status
     * @param array $headers
     *
     * @return ApiResponse
     */
    static public function redirectTemporary(string $location, $content = 'The resource has temporary been moved', int $status = ApiResponseCode::HTTP_REDIRECT_TEMPORARY, array $headers = array()) {
        $headers['Location'] = $location;

        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    // Client errors (400 - 499)

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     * 
     * @return ApiResponse
     */
    static public function accessDenied($content = 'You are not allowed to use this resource', int $status = ApiResponseCode::HTTP_ERROR_CLIENT_ACCESS_DENIED, array $headers = array()){
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     *
     * @return ApiResponse
     */
    static public function loginRequired($content = 'Login is required to use this resource', int $status = ApiResponseCode::HTTP_ERROR_CLIENT_LOGIN_REQUIRED, array $headers = array()){
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     * 
     * @return ApiResponse
     */
    static public function notFound($content = 'Resource was not found', int $status = ApiResponseCode::HTTP_ERROR_CLIENT_NOT_FOUND, array $headers = array()) {
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     *
     * @return ApiResponse
     */
    static public function notAcceptable($content = 'The supplied parameters are not acceptable', int $status = ApiResponseCode::HTTP_ERROR_CLIENT_NOT_FOUND, array $headers = array()) {
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }


    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     * 
     * @return ApiResponse
     */
    static public function invalidCredentials($content = 'Credentials are incorrect', int $status = ApiResponseCode::HTTP_ERROR_CLIENT_INVALID_CREDENTIALS, array $headers = array()){
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     * 
     * @return ApiResponse
     */
    static public function paymentRequired($content = 'Payment required', int $status = ApiResponseCode::HTTP_ERROR_CLIENT_PAYMENT_REQUIRED, array $headers = array()){
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    /**
     * @param int $status
     * @param array $headers
     *
     * @return ApiResponse
     */
    static public function validationError($validatorErrors, int $status = ApiResponseCode::HTTP_ERROR_CLIENT_VALIDATION_ERROR, array $headers = array()) {
        $response = ApiResponse::create($validatorErrors, $status, $headers);
        return $response;
    }

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     *
     * @return ApiResponse
     */
    static public function tooManyRequests($content = 'You are sending too many requests', int $status = ApiResponseCode::HTTP_ERROR_CLIENT_TOO_MANY_REQUESTS, array $headers = array()){
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }

    // Server error (500 - 599)

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     *
     * @return ApiResponse
     */
    static public function internalServerError($content = 'An internal error has occured', int $status = ApiResponseCode::HTTP_ERROR_SERVER_INTERNAL, array $headers = array()){
        $response = ApiResponse::create($content, $status, $headers);
        return $response;
    }
}
