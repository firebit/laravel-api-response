<?php


namespace Firebit\Laravel\ApiResponse;

use Illuminate\Http\Response;

class ApiResponse extends Response {
    /**
     * Sends content for the current web response.
     *
     * @return $this
     */
    public function sendContent() {
        $this->header('Content-Type', 'application/json');
        http_response_code($this->statusCode);

        if($this->getOriginalContent()){
            $content = $this->morphToJson($this->getOriginalContent());

            echo $content;
        }

        return $this;
    }

    /**
     * @param $headers
     */
    public function setHeaders($headers)
    {
        foreach ($headers as $key => $value){
            $this->header($key, $value);
        }
    }
}
