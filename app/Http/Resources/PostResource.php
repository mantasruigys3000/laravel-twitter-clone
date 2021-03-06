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
        if(auth()->check()){
            $isLiked =  auth()->user()->likes->contains($this->id);
        }

        return [
            'id' => $this->id,
            'content' => $this->content,
            'created_at' => $this->created_at->format('H:i:s d/m/y'),
            'username'=> $this->user->username,
            'posterId'=> $this->user->id,
            'picture' => $pp,
            'likescount' => $this->likesCount,
            'isLiked' => $isLiked,




        ];


    }
}
