<?php

namespace App\Containers\AppSection\Lesson\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Lesson\Tasks\CalendarLessonsTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class CalendarLessonsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(string $from, string $to): mixed
    {
        return app(CalendarLessonsTask::class)->run($from, $to);
    }
}
