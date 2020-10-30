<?php


namespace Firebit\Laravel\ApiResponse;

use Illuminate\Http\Response;

class ApiResponse extends Response {

    // Holds the optional error message (in case of a 'error')
    protected $errorCode;

    // Holds the optional error message (in case of a 'error')
    protected $errorMessage;

    // Hold the data
    protected $data;


    /**
     * Sends content for the current web response.
     *
     * @return $this
     */
    public function sendContent() {
        $this->header('Content-Type', 'application/json');
        http_response_code($this->statusCode);

        if($this->getOriginalContent()){
            $content = $this->morphToJson($this->formatToJsend());

            echo $content;
        }

        return $this;
    }

    /**
     * Formats the response according to the JSEND standard (https://github.com/omniti-labs/jsend)
     *
     * @return array|null
     */
    public function formatToJsend(){
        // Create an empty response
        $response = null;

        if (method_exists($this->data, '__toString') || is_scalar($this->data)){
            $response_data = $this->data;
        }else{
            $response_data = json_encode($this->data);
        }

        // If response is successful
        if($this->isSuccessful()){
            $response = [
                'status' => 'success',
                'data' => $response_data,
            ];

            // If reponse is a client error
        }elseif ($this->isClientError()){
            $response = [
                'status' => 'fail',
                'data' => $response_data,
            ];

            // If response is a server error
        }elseif ($this->isServerError()){
            $response = [
                'status' => 'error',
                'message' => $this->errorMessage,
            ];

            // Optional error code
            if($this->errorCode){
                $response['code'] = $this->errorCode;
            }

            // Optional data
            if($this->getOriginalContent()){
                $response['data'] = $response_data;
            }

        }

        return $response;
    }

    /**
     * @param $errorCode
     * @return $this
     */
    public function setErrorCode($errorCode){
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @param $errorMessage
     * @return $this
     */
    public function setErrorMessage($errorMessage){
        $this->errorMessage = $errorMessage;

        return $this;
    }

    /**
     * @param string|null $content
     * @param int $status
     * @param array $headers
     * @return ApiResponse|void
     */
    public static function create($content = '', int $status = 200, array $headers = []){
        $response = new ApiResponse($content, $status, $headers);
        $response->data = $content;

        return $response;
    }
}
