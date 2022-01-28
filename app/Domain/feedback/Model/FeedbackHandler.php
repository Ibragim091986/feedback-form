<?php


namespace App\Domain\feedback\Model;


abstract class FeedbackHandler
{
    abstract public function factoryStorage();

    abstract public function input($data);

    abstract public function validate();

    abstract public function save();
}