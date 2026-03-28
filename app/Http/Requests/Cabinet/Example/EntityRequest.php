<?php

declare(strict_types=1);

namespace App\Http\Requests\Cabinet\Example;

use App\Http\Requests\CommonRequest;

final class EntityRequest extends CommonRequest
{
    public function rules(): array
    {
        return [
            'client_id' => 'required|string',
        ];
    }
}
