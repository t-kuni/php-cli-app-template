<?php

namespace TKuni\PhpCliAppTemplate;

use Psr\Log\LoggerInterface;
use TKuni\PhpCliAppTemplate\Domain\AnkiCardAdder;
use TKuni\PhpCliAppTemplate\Domain\Models\ExampleModel;
use TKuni\PhpCliAppTemplate\Domain\ObjectValues\ExampleBody;
use TKuni\PhpCliAppTemplate\Infrastructure\interfaces\IAnkiWebAdapter;
use TKuni\PhpCliAppTemplate\Infrastructure\interfaces\IArgsAdapter;
use TKuni\PhpCliAppTemplate\Infrastructure\interfaces\IGithubAdapter;
use TKuni\PhpCliAppTemplate\Infrastructure\interfaces\IProgressRepository;
use TKuni\PhpCliAppTemplate\Infrastructure\interfaces\IExampleRepository;

class App
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var IExampleRepository
     */
    private $repo;
    /**
     * @var IArgsAdapter
     */
    private $args;

    public function __construct(LoggerInterface $logger, IExampleRepository $repo, IArgsAdapter $args)
    {
        $this->logger = $logger;
        $this->repo   = $repo;
        $this->args   = $args;
    }

    public function run()
    {
        try {
            $this->logger->info('Start application');

            $this->logger->info('パラメータの値', [
                'ip' => $this->args->getIP(),
                'file' => $this->args->getFilePath(),
            ]);

            $text  = getenv('TEXT_FROM_ENV');
            $model = new ExampleModel('id-0001', 'example-title', new ExampleBody($text));
            $this->repo->save($model);

            $this->logger->info('Exit application');
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw $e;
        }
    }
}