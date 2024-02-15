<?php

namespace App\Services\Quiz;

use App\Repositories\Quiz\PublicationQuizRepository;
use App\Models\questions_quizzes;

class PublicationQuizService
{
    public $publication;
    public function __construct(PublicationQuizRepository $publication)
    {
        $this->publication = $publication;
    }
    public function publication($id, $data)
    {
        $check_options = questions_quizzes::where('quiz_id', $id)->count();
        if ($check_options < 3) {
            # code...
            return false;
        } else {
            return $this->publication->update($id, $data);
        }
    }
}
