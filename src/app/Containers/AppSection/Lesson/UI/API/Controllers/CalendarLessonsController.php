<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Lesson\Actions\CalendarLessonsAction;
use App\Containers\AppSection\Lesson\UI\API\Requests\CalendarLessonsRequest;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class CalendarLessonsController extends ApiController
{
    /**
     * @param CalendarLessonsRequest $request
     * @return array
     * @throws CoreInternalErrorException
     * @throws InvalidTransformerException
     * @throws RepositoryException
     */
    public function calendarLessons(CalendarLessonsRequest $request): array
    {
        $from = $request->get('from');
        $to = $request->get('to');

        $lesson = app(CalendarLessonsAction::class)->run($from, $to);

        return $this->transform($lesson, LessonTransformer::class);
    }
}
