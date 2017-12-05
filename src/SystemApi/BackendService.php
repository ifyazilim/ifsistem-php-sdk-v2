<?php namespace SystemApi;

use GuzzleHttp\Client;
use Psr\Http\Message\UploadedFileInterface;
use SystemApi\Exception\BadRequestException;
use SystemApi\Exception\ForbiddenException;
use SystemApi\Exception\NotFoundException;
use SystemApi\Exception\UnauthorizedException;
use SystemApi\Exception\UnknownException;

class BackendService
{
    /**
     * @Inject
     * @var Container
     */
    private $c;

    /** @var string */
    public $token;

    /** @var int */
    public $langId = 1;

    /** @var string */
    public $baseUrl = 'http://backend.ifsistem.com';

    /** @var string */
    public $ip;

    public function get($endpoint, $body = null)
    {
        return $this->sendApi('GET', $endpoint, $body);
    }

    public function post($endpoint, $body = null, $files = null)
    {
        return $this->sendApi('POST', $endpoint, $body, $files);
    }

    public function put($endpoint, $body = null, $files = null)
    {
        return $this->sendApi('PUT', $endpoint, $body, $files);
    }

    public function delete($endpoint, $body = null)
    {
        return $this->sendApi('DELETE', $endpoint, $body);
    }


    /**
     * @param string $method
     * @param string $endpoint
     * @param array|null $body
     * @param UploadedFileInterface[]|null $files
     *
     * @return object
     *
     * @throws BadRequestException
     * @throws NotFoundException
     */
    private function sendApi($method, $endpoint, $body = null, $files = null)
    {
        $client = new Client();

        $options = [
            'http_errors' => false,
            'headers'     => [
                'X-Ip'      => $this->ip,
                'X-Token'   => $this->token,
                'X-Lang-Id' => $this->langId,
            ]
        ];

        if ( ! is_null($files) && is_array($files) && ! empty($files)) {

            // multipart

            $multipart = [];

            if (is_array($body) && ! empty($body)) {
                foreach ($body as $key => $item) {
                    $multipart[] = [
                        'name'     => $key,
                        'contents' => \GuzzleHttp\json_encode($item)
                    ];
                }
            }

            foreach ($files as $key => $file) {

                $item = [
                    'name'     => $key,
                    'contents' => $file->getStream(),
                ];

                if ( ! empty($file->getClientFilename())) {
                    $item['filename'] = $file->getClientFilename();
                }

                $multipart[] = $item;
            }

            $options = array_merge($options, [
                'multipart' => $multipart
            ]);

        } else {

            if (is_array($body) && ! empty($body)) {
                $options = array_merge($options, ['json' => $body]);
            }

        }

        $response = $client->request($method, $this->baseUrl . $endpoint, $options);

        switch ($response->getStatusCode()) {

            case 200:
                return $this->c->util->decode($response->getBody()->getContents());
                break;

            case 400:
                throw new BadRequestException($this->c->util->decode($response->getBody()->getContents())->message);
                break;

            case 401:
                throw new UnauthorizedException($this->c->util->decode($response->getBody()->getContents())->message);
                break;

            case 403:
                throw new ForbiddenException($this->c->util->decode($response->getBody()->getContents())->message);
                break;

            case 404:
                throw new NotFoundException($this->c->util->decode($response->getBody()->getContents())->message);
                break;

            default:
                throw new UnknownException($response->getBody()->getContents());
                break;
        }

    }
}