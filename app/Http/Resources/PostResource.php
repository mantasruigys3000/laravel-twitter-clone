<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $pp = ($this->user->picture == null)? '/images/default_pp.png': $this->user->picture->link;
        $isLiked = false;
        if(auth()->user() != null){
            $isLiked =  auth()->user()->profile->likes->contains($this->id);
        }

        return [
            'id' => $this->id,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'username'=> $this->user->username,
            'picture' => $pp,
            'likescount' => $this->likesCount,
            'isLiked' => $isLiked,




        ];


    }
}
