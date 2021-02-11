<?php

namespace App\Repositories\Eloquent;

use App\Models\File;
use App\Repositories\Eloquent\Base\BaseModelRepository;

class FileRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return File::class;
    }
}
