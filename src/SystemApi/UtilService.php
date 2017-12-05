<?php namespace SystemApi;

use SystemApi\Exception\JsonException;

class UtilService
{
    public function decode($json, $assoc = false, $depth = 512, $options = 0)
    {
        $data = json_decode($json, $assoc, $depth, $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonException('json_decode error: ' . json_last_error_msg() . '<br />' . $json);
        }

        return $data;
    }
}