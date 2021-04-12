<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 26 Jan 2021
 * Time: 11:45 AM
 */

namespace Shared\BaseClasses;


use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

abstract class Job implements ShouldQueue
{
    use \Shared\Traits\Response;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
}
