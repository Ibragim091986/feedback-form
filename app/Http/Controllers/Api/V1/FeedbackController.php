<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\feedback\Model\SiteFeedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $feedback = new SiteFeedback();
        $feedback->input($request);
        if ($feedback->validate()->fails()) {
            return  [
                'status' => false,
                'errors' => $feedback->validate()->messages()
            ];
        }
        $feedback->save();
        return [
            'status' => true,
        ];
    }
}
