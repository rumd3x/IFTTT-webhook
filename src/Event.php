<?php
namespace Rumd3x\IFTTT;

use Rumd3x\Standards\NotificationInterface;

class Event implements NotificationInterface {

    /**
     * The name of the event, like "button_pressed" or "front_door_opened"
     *
     * @var string
     */
    private $name;

    /**
     * Optional JSON body
     *
     * @var array
     */
    private $body = [];

    /**
     * Returns a new IFTTT Event Instance
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Retrieve the Event Name
     *
     * @return string
     */
    public function getName(): string
    {
        return trim($this->name);
    }

    /**
     * Retrieve the optional JSON body
     *
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * Adds optional value1 property to the optional JSON body or replaces the current one
     *
     * @param string $value
     * @return self
     */
    public function withValue1(string $value): self
    {
        $this->body["value1"] = $value;
        return $this;
    }

    /**
     * Adds optional value2 property to the optional JSON body or replaces the current one
     *
     * @param string $value
     * @return self
     */
    public function withValue2(string $value): self
    {
        $this->body["value2"] = $value;
        return $this;
    }

    /**
     * Adds optional value3 property to the optional JSON body or replaces the current one
     *
     * @param string $value
     * @return self
     */
    public function withValue3(string $value): self
    {
        $this->body["value3"] = $value;
        return $this;
    }
}
