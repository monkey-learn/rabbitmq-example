<?php

namespace App;

abstract class RabbitMQAbstract
{
    protected $connection;
    protected $channel;
    protected $exchange;

    public function __construct(array $config)
    {
        $this->connection = $this->connect($config['connection']);
        $this->channel = $this->createChannel($this->connection);
        $this->exchange = $this->createExchange($this->channel, $config['exchange']);
    }

    abstract protected function connect($connection);
    abstract protected function createChannel($connection);
    abstract protected function createExchange($channel, $exchange);

    abstract public function createProducer(): ProducerAbstract;
    abstract public function createConsumer(): ConsumerAbstract;
}
