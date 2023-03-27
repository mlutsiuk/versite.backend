<?php

namespace App\Containers\AppSection\Student\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\UpdateStudentTask;
use App\Containers\AppSection\Student\Data\Dto\UpdateStudentDto;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateStudentAction extends ParentAction
{
    /**
     * @param UpdateStudentDto $dto
     * @param $id
     * @return Student
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateStudentDto $dto, $id): Student
    {
        return app(UpdateStudentTask::class)->run($dto, $id);
    }
}
