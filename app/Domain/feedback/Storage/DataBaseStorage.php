<?php


namespace App\Domain\feedback\Storage;


use App\Domain\feedback\DTO\DataTransferObject;

class DataBaseStorage implements Storage
{

    public function put(DataTransferObject $data)
    {
        // TODO: Implement put() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function search($name = null, $phone = null)
    {
        // TODO: Implement search() method.
    }

    public function errors()
    {
        // TODO: Implement errors() method.
    }
}