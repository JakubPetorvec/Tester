<?php

namespace Parsers;
use Entities\Question;

class QuestionParser{
    public function parse(array $postData): Question
    {
        $question = new Question();
        $question->setQuestion($postData["txtQuestion"]);
        for($i = 0 ; $i < 3; $i++){
            if(isset($postData['check'][$i])){
                $question->setType(1);
                return $question;
            }
        }
        $question->setType(0);
        return $question;
    }
}
