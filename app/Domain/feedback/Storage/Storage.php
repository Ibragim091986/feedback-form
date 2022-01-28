<?php


namespace App\Domain\feedback\Storage;


use App\Domain\feedback\DTO\DataTransferObject;

interface Storage
{
    public function put(DataTransferObject $data);

    public function delete($id);

    public function search($name = null, $phone = null);

    public function errors();


}