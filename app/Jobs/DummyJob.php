<?php

namespace App\Jobs;

use App\Services\DummyService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class DummyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    private $params;

    /**
     * Create a new job instance.
     *
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    /**
     * @param DummyService $service
     * @throws \Exception
     */
    public function handle(DummyService $service)
    {
        $service->dummyJobLogic(
            $this->params['loop'], $this->params['delay']
        );
    }
}
