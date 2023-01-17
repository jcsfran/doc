<?php

namespace Julio\Swagger\Src\Console;

use Julio\Swagger\Src\DocumentationHelper;
use Illuminate\Console\Command;

class CreateRouteForDocumentation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docs:route {path} {--index} {--show} {--post} {--put} {--delete} {--auth}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new file with your actions';

    public function __construct(DocumentationHelper $service)
    {
        $this->documentationHelper = $service;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $options = $this->checkOptionsReported();
        $this->checkIfAtLeastOneActionWasReported(options: $options);

        $path = $this
            ->documentationHelper
            ->createAction(
                originalPath: $this->argument('path'),
                options: $this->argument('action'),
                auth: $this->option('auth'),
                names: $this->option('name')
            );

        return $this->info('Created file: ' . $path);
    }

    private function checkOptionsReported(): array
    {
        $options = [];
        if ($this->option('index')) {
            $options[] = 'index';
        }

        if ($this->option('show')) {
            $options[] = 'show';
        }

        if ($this->option('post')) {
            $options[] = 'post';
        }

        if ($this->option('put')) {
            $options[] = 'put';
        }

        if ($this->option('delete')) {
            $options[] = 'delete';
        }

        return $options;
    }

    private function checkIfAtLeastOneActionWasReported(array $options): void
    {
        if (empty($options)) {
            $message = $this->error(
                'Please select at least one action.'
            );

            $message .= $this->alert(
                '--index --show --post --put or --delete'
            );

            exit;
        }
    }
}
