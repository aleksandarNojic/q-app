<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Client
{
    /**
     * Client url
     *
     * @var [type]
     */
    private $uri;

    /**
     * Client Contructor
     *
     * @param string $uri
     */
    public function __construct($url)
    {
        $this->uri = $url;
    }

    /**
     * http GET
     *
     * @param string $path
     * @param array $query
     */
    public function get(string $path, array $query = [])
    {
        return $this->handleResponse($this->http()->get($this->uri . "/$path", $query));
    }

    /**
     * http POST
     *
     * @param string $path
     * @param array $json
     */

    public function post(string $path, array $json)
    {
        $response = $this->http()->post($this->uri . "/$path", $json);

        return $this->handleResponse($response);
    }

    /**
     * http DELETE
     *
     * @param string $path
     * @return void
     */
    public function delete(string $path)
    {
        $response = $this->http()->delete($this->uri . "/$path");

        return $this->handleResponse($response);
    }

    /**
     * API for author creation
     *
     * @param string $token
     * @param array $json
     */
    public function createAuthors(string $token, array $json)
    {
        $this->http()->withToken($token)->post($this->uri . "/authors", $json);
    }

    /**
     * @return Http
     */
    private function http()
    {
        return  Http::withToken(session('token_key'));
    }

    /**
     * Response handling
     *
     * @param $response
     */
    private function handleResponse($response)
    {
        return json_decode($response->body());
    }
}
