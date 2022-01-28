<?php


namespace App\Domain\feedback\Model;


use App\Domain\feedback\DTO\MessageFromFrontendData;
use App\Domain\feedback\Storage\LocalStorage;

class SiteFeedback extends FeedbackHandler
{
    private $storage = null;

    /** @var null|MessageFromFrontendData */
    private $data = null;

    public function factoryStorage(): LocalStorage
    {
        if (!empty($this->storage)) {
            $this->storage;
        }
        $this->storage = new LocalStorage();
        return $this->storage;
    }

    public function input($request)
    {
        $this->data = MessageFromFrontendData::fromRequest($request);
    }

    public function validate()
    {
        if (!empty($this->data)) {
            return $this->data->validate();
        }
        return $this->data;
    }

    public function save()
    {
        if (!empty($this->data)) {
            $this->factoryStorage()->put($this->data);
        }
    }
}