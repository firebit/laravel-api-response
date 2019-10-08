<?php


namespace Firebit\Laravel\ApiResponse;


class ApiResponseFactory
{
    // Success (200 - 299)

    /**
     * @param null $content
     * @return ApiResponse
     */
    static public function success($content = null) {
        return ApiResponseTypes::success($content);
    }

    /**
     * @param null $content
     * @return ApiResponse
     */
    static public function created($content = null) {
        return ApiResponseTypes::success($content, ApiResponseCode::HTTP_SUCCESS_CREATED);
    }

    /**
     * @param null $content
     * @return ApiResponse
     */
    static public function accepted($content = null) {
        return ApiResponseTypes::success($content, ApiResponseCode::HTTP_SUCCESS_ACCEPTED);
    }

    // Redirection (300 - 399)

    /**
     * @param string $location
     * @param string $content
     * @return ApiResponse
     */
    static public function redirectPermanent(string $location, $content = "Resource has permanently been moved") {
        return ApiResponseTypes::error($content, ApiResponseCode::HTTP_REDIRECT_PERMANENT)->header('Location', $location);
    }

    /**
     * @param string $location
     * @param string $content
     * @return ApiResponse
     */
    static public function redirectTemporary(string $location, $content = "Resource has temporarily been moved") {
        return ApiResponseTypes::error($content, ApiResponseCode::HTTP_REDIRECT_TEMPORARY)->header('Location', $location);
    }

    // Client errors (400 - 499)

    /**
     * @param string $content
     * @return ApiResponse
     */
    static public function accessDenied($content = 'You are not allowed to use this resource'){
        return ApiResponseTypes::fail($content, ApiResponseCode::HTTP_ERROR_CLIENT_ACCESS_DENIED);
    }

    /**
     * @param string $content
     * @return ApiResponse
     */
    static public function loginRequired($content = 'Login is required to use this resource'){
        return ApiResponseTypes::fail($content, ApiResponseCode::HTTP_ERROR_CLIENT_LOGIN_REQUIRED);
    }

    /**
     * @param string $content
     * @return ApiResponse
     */
    static public function notFound($content = 'Resource was not found') {
        return ApiResponseTypes::fail($content, ApiResponseCode::HTTP_ERROR_CLIENT_NOT_FOUND);
    }

    /**
     * @param string $content
     * @return ApiResponse
     */
    static public function notAcceptable($content = 'The supplied parameters are not acceptable') {
        return ApiResponseTypes::fail($content, ApiResponseCode::HTTP_ERROR_CLIENT_NOT_ACCEPTABLE);
    }


    /**
     * @param string $content
     * @return ApiResponse
     */
    static public function invalidCredentials($content = 'Credentials are incorrect'){
        return ApiResponseTypes::fail($content, ApiResponseCode::HTTP_ERROR_CLIENT_INVALID_CREDENTIALS);
    }

    /**
     * @param string $content
     * @return ApiResponse
     */
    static public function paymentRequired($content = 'Payment required'){
        return ApiResponseTypes::fail($content, ApiResponseCode::HTTP_ERROR_CLIENT_PAYMENT_REQUIRED);
    }

    /**
     * @param array $validatorErrors
     * @return ApiResponse
     */
    static public function validationError(array $validatorErrors) {
        return ApiResponseTypes::fail($validatorErrors, ApiResponseCode::HTTP_ERROR_CLIENT_VALIDATION_ERROR);
    }

    /**
     * @param string $content
     * @return ApiResponse
     */
    static public function tooManyRequests($content = 'You are sending too many requests'){
        return ApiResponseTypes::fail($content, ApiResponseCode::HTTP_ERROR_CLIENT_TOO_MANY_REQUESTS);
    }

    // Server error (500 - 599)

    /**
     * @param string $error_message
     * @param int|null $error_code
     * @return ApiResponse
     */
    static public function internalServerError($error_message = 'An internal error has occured', $error_code = null){
        $response = ApiResponseTypes::error($error_message, ApiResponseCode::HTTP_ERROR_SERVER_INTERNAL);

        if($error_code){
            $response->setErrorCode($error_code);
        }

        return $response;
    }
}
