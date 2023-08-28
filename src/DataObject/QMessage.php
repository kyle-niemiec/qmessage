<?php

namespace CBW\QMessage\DataObject;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class QMessage
 * @package CBW\QMessage\DataObject
 */
final class QMessage
{
    /** @var string */
    #[Serializer\Groups(["default", "accept"])]
    private $event;

    /** @var int */
    #[Serializer\Groups(["default", "accept"])]
    private $timestamp;

    /** @var string */
    #[Serializer\Groups(["default", "accept"])]
    private $traceId;

    /** @var string */
    #[Serializer\Groups(["default", "accept"])]
    private $source;

    /** @var integer */
    #[Serializer\Groups(["default", "accept"])]
    private $attempts;

    /** @var array The serialized data-object */
    #[Serializer\Groups(["default", "accept"])]
    private $data;

    /** @var int */
    private $franchiseId;

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @param string $event
     *
     * @return QMessage
     */
    public function setEvent(string $event): QMessage
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     *
     * @return QMessage
     */
    public function setTimestamp(int $timestamp): QMessage
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getTraceId(): string
    {
        return $this->traceId;
    }

    /**
     * @param string $traceId
     *
     * @return QMessage
     */
    public function setTraceId(string $traceId): QMessage
    {
        $this->traceId = $traceId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return QMessage
     */
    public function setSource(string $source): QMessage
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttempts(): int
    {
        return $this->attempts;
    }

    /**
     * @param int $attempts
     *
     * @return QMessage
     */
    public function setAttempts(int $attempts): QMessage
    {
        $this->attempts = $attempts;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return QMessage
     */
    public function setData(array $data): QMessage
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return int
     */
    public function getFranchiseId(): int
    {
        return $this->franchiseId;
    }

    /**
     * @param int $franchiseId
     *
     * @return QMessage
     */
    public function setFranchiseId(int $franchiseId): QMessage
    {
        $this->franchiseId = $franchiseId;
        return $this;
    }
}