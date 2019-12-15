<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Resource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'haytruyen:res {name : The name of the resource - singular}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new resource';

    /**
     * Resource title case
     *
     * @var string
     */
    private $rtc;

    /**
     * Resource snake case
     *
     * @var string
     */
    private $rsc;

    /**
     * Resource camel case
     *
     * @var string
     */
    private $rcc;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $this->rtc = ucfirst($this->argument('name'));
        $this->rcc = Str::camel($this->argument('name'));
        $this->rsc = Str::snake($this->argument('name'));

        $this->generateMigration();
        $this->generateModel();
        $this->generateInterface();
        $this->generateRepository();
        $this->generateController();
        $this->generateView();
        $this->addToAppServiceProvider();
        $this->warn('New resource generated successfully');
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateMigration(): void
    {
        [$rscp, $now] = [Str::plural($this->rsc), now()];
        $result = File::put(
            $f = 'database/migrations/' . $now->format('Y_m_d') . '_000000_create_' . $rscp . '_table.php',
            $this->replaceStub('migration')
        );
        $this->printMessage($result, $f);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateController(): void
    {
        $result = File::put(
            $f = 'app/Http/Controllers/' . $this->rtc . 'Controller.php',
            $this->replaceStub('Controller')
        );
        $this->printMessage($result, $f);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateModel(): void
    {
        $result = File::put(
            $f = 'app/Models/' . $this->rtc . '.php',
            $this->replaceStub('Model')
        );
        $this->printMessage($result, $f);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateRepository(): void
    {
        $result = File::put(
            $f = 'app/Repositories/' . $this->rtc . 'Repository.php',
            $this->replaceStub('Repository')
        );
        $this->printMessage($result, $f);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateInterface(): void
    {
        $result = File::put(
            $f = 'app/Repositories/Contracts/' . $this->rtc . 'Interface.php',
            $this->replaceStub('Interface')
        );
        $this->printMessage($result, $f);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateView(): void
    {
        $result = File::put(
            $f = 'resources/views/desktop/' . $this->rsc . '.blade.php',
            $this->replaceStub('ViewDesktop')
        );
        $this->printMessage($result, $f);

        $result = File::put(
            $f = 'resources/views/mobile/' . $this->rsc . '.blade.php',
            $this->replaceStub('ViewMobile')
        );
        $this->printMessage($result, $f);
    }

    /**
     * Append route parameters to AppServiceProvider
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function addToAppServiceProvider(): void
    {
        $space = '        '; // this is for alignment, see the AppServiceProvider file for this
        $result = File::put(
            $f = 'app/Providers/AppServiceProvider.php',
            str_replace(
                [
                    $m = $space . '/** GENERATOR_REPOSITORY_BINDER **/'
                ],
                [
                    rtrim($this->replaceStub('ASPRepository')) . PHP_EOL . $m
                ],
                File::get($f)
            )
        );
        $this->printMessage($result, $f, 'Added repository register to:', 'Could not add repository register to', $f);
    }

    /**
     * @param string $stub
     *
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function replaceStub($stub)
    {
        return str_replace(
            ['{{MODEL_NAME}}', '{{MODEL_NAME_SNAKECASE}}','{{MODEL_NAME_CAMEL_CASE}}', '{{MODEL_NAME_PLURAL}}', '{{MODEL_NAME_PLURAL_LOWERCASE}}'],
            [$this->rtc, $this->rsc, $this->rcc, $rtcp = Str::plural($this->rtc), Str::plural($this->rsc)],
            File::get(storage_path('stubs/' . $stub))
        );
    }

    /**
     * @param        $result
     * @param        $filePath
     * @param string $sm => Success Message
     * @param string $wm => Warning Message
     */
    private function printMessage($result, $filePath, $sm = 'Created file:', $wm = 'Failed to create file:'): void
    {
        $result ? $this->info($sm . ' ' . $filePath) : $this->warn($wm . ' ' . $filePath);
    }
}
