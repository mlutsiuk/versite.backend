<?php

namespace App\Containers\AppSection\Student\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\CreateStudentTask;
use App\Containers\AppSection\Student\Data\Dto\CreateStudentDto;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateStudentAction extends ParentAction
{
    /**
     * @param CreateStudentDto $dto
     * @return Student
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateStudentDto $dto): Student
    {
        return app(CreateStudentTask::class)->run($dto);
    }
}
