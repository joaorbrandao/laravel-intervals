<?php


namespace Joaorbrandao\LaravelIntervals\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeLaravelInterval extends GeneratorCommand
{
    protected $name = 'make:interval';
    protected $description = 'Create a laravel interval.';

    public function handle()
    {
        return parent::handle();
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\LaravelIntervals';
    }

    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);

        $stub = $this->replaceIntervalId($stub);
        $stub = $this->replaceFilterAlias($stub);

        return $stub;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the laravel interval (e.g. Last365Days).'],
        ];
    }

    protected function getStub()
    {
        return __DIR__.'/stubs/interval.stub';
    }

    private function replaceFilterAlias(string $stub): string
    {
        return str_replace(
            'DummyName',
            Str::snake($this->argument('name')),
            $stub
        );
    }

    private function replaceIntervalId(string $stub): string
    {
        return str_replace(
            'DummyId',
            Str::camel($this->argument('name')),
            $stub
        );
    }
}
