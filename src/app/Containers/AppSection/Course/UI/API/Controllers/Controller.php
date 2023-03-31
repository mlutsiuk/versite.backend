<?php

namespace App\Containers\AppSection\Course\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Course\Actions\CreateCourseAction;
use App\Containers\AppSection\Course\Actions\DeleteCourseAction;
use App\Containers\AppSection\Course\Actions\FindCourseByIdAction;
use App\Containers\AppSection\Course\Actions\GetAllCoursesAction;
use App\Containers\AppSection\Course\Actions\UpdateCourseAction;
use App\Containers\AppSection\Course\Data\Dto\CreateCourseDto;
use App\Containers\AppSection\Course\Data\Dto\UpdateCourseDto;
use App\Containers\AppSection\Course\UI\API\Requests\CreateCourseRequest;
use App\Containers\AppSection\Course\UI\API\Requests\DeleteCourseRequest;
use App\Containers\AppSection\Course\UI\API\Requests\FindCourseByIdRequest;
use App\Containers\AppSection\Course\UI\API\Requests\GetAllCoursesRequest;
use App\Containers\AppSection\Course\UI\API\Requests\UpdateCourseRequest;
use App\Containers\AppSection\Course\UI\API\Transformers\CourseTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class Controller extends ApiController
{
    /**
     * @param CreateCourseRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     * @throws UnknownProperties
     */
    public function createCourse(CreateCourseRequest $request): JsonResponse
    {
        $dto = new CreateCourseDto($request->validated());
        $course = app(CreateCourseAction::class)->run($dto);

        return $this->created($this->transform($course, CourseTransformer::class));
    }

    /**
     * @param FindCourseByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCourseById(FindCourseByIdRequest $request): array
    {
        $course = app(FindCourseByIdAction::class)->run($request->validated()['id']);

        return $this->transform($course, CourseTransformer::class);
    }

    /**
     * @param GetAllCoursesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCourses(GetAllCoursesRequest $request): array
    {
        $courses = app(GetAllCoursesAction::class)->run();

        return $this->transform($courses, CourseTransformer::class);
    }

    /**
     * @param UpdateCourseRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UnknownProperties
     * @throws UpdateResourceFailedException
     */
    public function updateCourse(UpdateCourseRequest $request): array
    {
        $dto = new UpdateCourseDto($request->validated());
        $course = app(UpdateCourseAction::class)->run($dto, $request->validated()['id']);

        return $this->transform($course, CourseTransformer::class);
    }

    /**
     * @param DeleteCourseRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteCourse(DeleteCourseRequest $request): JsonResponse
    {
        app(DeleteCourseAction::class)->run($request->validated()['id']);

        return $this->noContent();
    }
}
