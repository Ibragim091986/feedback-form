<?php


namespace App\Domain\feedback\Storage;


use App\Domain\feedback\DTO\DataTransferObject;

class LocalStorage implements Storage
{
    private $patch;

    public function __construct()
    {
        $this->patch = storage_path('feedback');
        if (!is_dir($this->patch)) {
            mkdir($this->patch, 0777);
            chmod($this->patch, 0777);
        }
    }

    public function put(DataTransferObject $data)
    {
        $fileName = 'store.txt';
        $file = $this->patch . '/' . $fileName;
        $current = 'name: ' . $data->name . ', phone: ' . $data->phone . ', message: ' . $data->message . "\n";
        file_put_contents($file, $current, FILE_APPEND | LOCK_EX);
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