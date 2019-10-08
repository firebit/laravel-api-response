<?php


namespace Firebit\Laravel\ApiResponse;

use Illuminate\Http\Response;

class ApiResponse extends Response {

    // Holds the optional error message (in case of a 'error')
    protected $errorCode;

    // Holds the optional error message (in case of a 'error')
    protected $errorMessage;


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

        // If response is successful
        if($this->isSuccessful()){
            $response = [
                'status' => 'success',
                'data' => $this->getOriginalContent(),
            ];

        // If reponse is a client error
        }elseif ($this->isClientError()){
            $response = [
                'status' => 'fail',
                'data' => $this->getOriginalContent(),
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
                $response['data'] = $this->getOriginalContent();
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
}
