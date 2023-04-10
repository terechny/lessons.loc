<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Course;
use App\Http\Resources\UserCollection;

class StudyController extends Controller
{
    
    public function studentsProgress(){
 
        return new UserCollection(User::withCount('lessons')->orderByDesc('lessons_count')->paginate(10));
    } 
}
