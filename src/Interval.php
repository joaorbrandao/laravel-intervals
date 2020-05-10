<?php


namespace Joaorbrandao\LaravelIntervals;

use \JsonSerializable;
use \DateInterval;

class Interval implements JsonSerializable
{
    /**
     * @var \Carbon\Carbon
     */
    public $end;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var \Carbon\Carbon
     */
    public $start;

    /**
     * @var bool
     */
    private $enabled = false;

    public function __construct($laravelConfig)
    {
        $this->loadAsArray($laravelConfig);
    }

    /**
     * Check if the interval is enabled.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled === true;
    }

    /**
     * Check if the interval is disabled.
     *
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->enabled === false;
    }

    /**
     * Check if the current interval contains a given time in between
     * the start and end times.
     *
     * @param $time
     * @return bool
     */
    public function contains($time): bool
    {
        return $this->start->lessThanOrEqualTo($time) && $this->end->greaterThanOrEqualTo($time);
    }

    /**
     * Check if the current interval does not contain a given time in between
     * the start and end times.
     *
     * @param $time
     * @return bool
     */
    public function notContains($time): bool
    {
        return !$this->contains($time);
    }

    /**
     * Export this interval to a DateInterval format.
     *
     * @return bool|DateInterval
     */
    public function toDateInterval()
    {
        return $this->end->diff($this->start);
    }

    /**
     * Return JSON encoded current class instance.
     *
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->payload());
    }

    /**
     * This object as string.
     *
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this->payload());
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->payload();
    }

    /**
     * Set the payload to be exported from the current class.
     *
     * @return array
     */
    private function payload(): array
    {
        return [
            'start' => $this->start->toDateTimeString(),
            'end' => $this->end->toDateTimeString(),
            'enabled' => $this->enabled,
            'id' => $this->id,
            'name' => $this->name
        ];
    }

    /**
     * Load the configurations from the config file.
     *
     * @param  array  $laravelInterval
     */
    private function loadAsArray(array $laravelInterval)
    {
        foreach ($laravelInterval as $key => $value) {
            $this->$key = $value;
        }
    }
}