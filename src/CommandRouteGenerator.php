<?php

namespace Tightenco\Ziggy;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Tightenco\Ziggy\Ziggy;
use Tightenco\Ziggy\GeneratedEvent;

class CommandRouteGenerator extends Command
{
    protected $signature = 'ziggy:generate {path=./public/vendor/ziggy/ziggy.js} {--url=} {--group=}';

    protected $description = 'Generate js file for including in build process';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        $path = $this->argument('path');
        $generatedRoutes = $this->generate($this->option('group'));

        $this->makeDirectory($path);
        $this->files->put(base_path($path), $generatedRoutes);

        event(new GeneratedEvent());

        $this->info('File generated!');
    }

    private function generate($group = false)
    {
        $payload = (new Ziggy($group, $this->option('url') ? url($this->option('url')) : null))->toJson();

        return <<<JAVASCRIPT
const Ziggy = {$payload};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}



JAVASCRIPT;
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname(base_path($path)))) {
            $this->files->makeDirectory(dirname(base_path($path)), 0755, true, true);
        }

        return $path;
    }
}
