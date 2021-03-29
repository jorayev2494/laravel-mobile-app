<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\TestTwooRequest;
use App\Jobs\QueuePrefixesInterface;
use App\Jobs\TestJob;
use App\Jobs\UserJob;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * TestClass
 * 
 * @property string $name
 */
class TestController extends Controller
{

    /**
    * @var UserService $userService
    */
    private UserService $userService;

    public function test(): JsonResponse
    {
        $result = false;

        $result = Cache::put('test', 'test_value', now()->addMinutes(10));
        $result = Cache::get('testd', function(): mixed {
            return ['test' => 'default_value_from_closure'];
        });

        /**
         * @var User $user
        */
        $user = User::first();
        $user->name = null;

        // dd(
        //     $result,
        //     $this->testTypes(arg3: 'value3', arg2: 123, arg: 123.0)
        // );

        return response()->json($result);
    }

    // Crush test PHP 8
    private function testTypes(mixed $arg, mixed $arg2, mixed $arg3): mixed
    {
        $result = [];

        foreach (func_get_args() as $key => $value) {
            $result[] = [
                'type_of' => gettype($value),
                'value' => $value,
            ];
        }

        return $result;
    }

    public function testJobs(int $userId): JsonResponse
    {
        $foundUser = User::findOrFail($userId);
        TestJob::dispatch($foundUser)->onQueue(QueuePrefixesInterface::PREFIX_EMAILS)->delay(now()->addMinutes(1));
        // UserJob::dispatch($foundUser)->onQueue(QueuesPrefixesInterface::PREFIX_EMAILS)->delay(now()->addMinutes(4));
        return response()->json();
    }

    public function service(UserService $userService): JsonResponse
    {
        $this->userService = $userService;
        $result = $this->userService->test();
        return response()->json($result);
    }

    public function testTwo(TestTwooRequest $request): JsonResponse
    {

        // /** @var UserService $userService */
        // $userService = resolve(UserService::class);
        // $userService->getCloneModelRepository()->getModelClone()->testBuilder();
        dd('awdwad');
        return response()->json($request->validated());
    }
}
