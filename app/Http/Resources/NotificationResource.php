<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $pp = ($this->profile->picture == null)? '/images/default_pp.png': $this->profile->picture->link;
        return [
            'seen' => $this->seen,
            'content' => $this->content,
            'username' => $this->profile->username,
            'fromUsername' => $this->from->username,
            'picture' => $pp,

        ];

    }
}
