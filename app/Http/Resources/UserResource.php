<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [
            'token' => $this->token,
            'username' => $this->username,
            'photo' => $this->photo,
            'name' => $this->name,
            'bio' => $this->bio,
            'email' => $this->email,
        ];

        if (!$this->token) {
            unset($response['token']);
        }

        return $response;
    }
}
