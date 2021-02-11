<?php

namespace App\Jobs;

interface QueuePrefixesInterface {
    public const PREFIX_DEFAULT = 'default';
    public const PREFIX_EMAILS = 'emails';
    public const PREFIX_JOBS = 'jobs';
}