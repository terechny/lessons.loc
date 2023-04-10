<?php

namespace App\Services;

use App\Models\Course;

class LessonService
{

    public function store($data){
            
        return response()->json(['data' => Course::findOrFail( $data['course_id'] )->lessons()->create([ 

                'title' =>  $data['title'],
                'description' => $data['description']               
            ]) 
        ]);         
    }
}