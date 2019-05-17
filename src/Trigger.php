<?php
namespace Rumd3x\IFTTT;

use Rumd3x\Standards\NotifierInterface;
use Rumd3x\Standards\NotificationInterface;

class Trigger implements NotifierInterface {

    /**
     * Your IFTTT Webhook KEY
     *
     * @var string
     */
    private $key;

    /**
     * The number of milliseconds to delay before sending the request.
     *
     * @var int
     */
    private $delay;

    /**
     * Template IFTTT webhook url
     *
     * @param string $key
     */
    const URL_TEMPLATE = "https://maker.ifttt.com/trigger/%s/with/key/%s";

    /**
     * Returns a new IFTTT Trigger Instance
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = trim($key);
    }

    /**
     * Adds delay before sending the request.
     *
     * @param integer $delay
     * @return self
     */
    public function withDelay(int $delay): self
    {
        $this->delay = $delay;
        return $this;
    }

    /**
     * Triggers the webhook for the given event
     *
     * @param NotificationInterface $event
     * @return GuzzleHttp\Psr7\Response
     */
    public function notify(NotificationInterface $event)
    {
        $clientOptions = [
            'allow_redirects' => false,
            'connect_timeout' => 10,
            'read_timeout' => 10,
            'timeout' => 15,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'verify' => false,
            'json' => $event->getBody(),
            'delay' => $this->delay,
        ];

        $client = new \GuzzleHttp\Client($clientOptions);
        $response = $client->post(sprintf(self::URL_TEMPLATE, $event->getName(), $this->key));
        return $response;
    }
}
