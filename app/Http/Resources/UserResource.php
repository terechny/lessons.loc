<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Lesson;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $allLessonsCount = Lesson::all()->count();
                
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'lessons_count' => $this->lessons_count,
            'cours_lessons' => $allLessonsCount,
            'progress' => round( $this->lessons_count / ( $allLessonsCount / 100 ) ) 					
        ];       
    }
}
