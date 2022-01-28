<?php


namespace App\Domain\feedback\DTO;


abstract class DataTransferObject
{
    public $name;

    public $phone;

    public $message;

    public $validator;

    public $request;

    abstract public static function fromRequest($request): DataTransferObject;

    abstract public function validate();
}