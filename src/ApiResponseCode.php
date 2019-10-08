<?php


namespace Firebit\laravel\ApiResponse;


class ApiResponseCode
{
    // Informational (100 - 199)

    // Success (200 - 299)
    const HTTP_SUCCESS = 200;
    const HTTP_SUCCESS_CREATED = 201;
    const HTTP_SUCCESS_ACCEPTED = 202;
    const HTTP_SUCCESS_NO_CONTENT = 204;

    // Redirection (300 - 399)
    const HTTP_REDIRECT_PERMANENT = 301;
    const HTTP_REDIRECT_TEMPORARY = 302;

    // Client errors (400 - 499)
    const HTTP_ERROR_CLIENT_INVALID_CREDENTIALS = 401;
    const HTTP_ERROR_CLIENT_PAYMENT_REQUIRED = 402;
    const HTTP_ERROR_CLIENT_LOGIN_REQUIRED = 401;
    const HTTP_ERROR_CLIENT_ACCESS_DENIED = 403;
    const HTTP_ERROR_CLIENT_NOT_FOUND = 404;
    const HTTP_ERROR_CLIENT_NOT_ACCEPTABLE = 406;
    const HTTP_ERROR_CLIENT_VALIDATION_ERROR = 422;
    const HTTP_ERROR_CLIENT_TOO_MANY_REQUESTS = 429;

    // Server error (500 - 599)
    const HTTP_ERROR_SERVER_INTERNAL = 500;
}
