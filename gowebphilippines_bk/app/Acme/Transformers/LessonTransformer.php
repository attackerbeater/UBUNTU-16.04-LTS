<?php 

namespace App\Acme\Transformers;
use App\Acme\Transformer;

class LessonTransformer extends Transformer {

    public function transform($lesson) {

    	return $lesson;

        // return [
        //     'title'  => $lesson['title'],
        //     'body'   => $lesson['body'],
        //     'active' => (boolean) $lesson['completed']
        // ];

    }

}