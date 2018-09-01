<?php
namespace App\Services;
use Exception;
use Illuminate\Support\Carbon;
use Psr\Log\LoggerInterface;
use function array_random;
use function sleep;

class DummyService
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Simulate complex logic with element of surprise
     *
     * @param int $loop
     * @param int $delay
     *
     * @throws \Exception
     */
    public function dummyJobLogic(int $loop = 10, int $delay = 1)
    {
        for ($i = 0; $i < $loop; $i++) {
            $this->logger->info('Iteration #' . $i . '/' . $loop);
            sleep($delay);
            if (Carbon::now()->timestamp % 10 === 0) {
                throw new Exception('Ooops! Random Fail');
            }
        }
        $this->logger->info(__METHOD__ . ' complete');
    }
}