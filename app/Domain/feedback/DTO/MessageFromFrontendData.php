<?php


namespace App\Domain\feedback\DTO;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MessageFromFrontendData extends DataTransferObject
{

    public static function fromRequest($request): DataTransferObject
    {
        $data = new self();
        $data->request = $request;
        $data->name = $request->post('name') ?? null;
        $data->phone =$request->post('phone') ?? null;
        $data->message = $request->post('message') ?? null;
        return $data;
    }

    public function validate()
    {
        if (!empty($this->validator)) {
            return $this->validator;
        }
        $message = [
            'name.required' => 'Поле обязательное',
            'phone.required' => 'Поле обязательное',
            'message.required' => 'Поле обязательное',
        ];
        $this->validator = Validator::make($this->request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], $message);
        return $this->validator;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'message' => $this->message,
        ];
    }
}