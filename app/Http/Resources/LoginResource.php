<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'role' => $this->unit->role,
            'fakultas' => $this->unit->fakultas,
            'prodi' => $this->unit->prodi,
            'profile' => [
                'phone' => $this->profile->phone,
                'birth' => $this->profile->birth,
                'address' => $this->profile->address,
            ],
            'token' => $this->whenNotNull($this->token)
        ];
    }
}
