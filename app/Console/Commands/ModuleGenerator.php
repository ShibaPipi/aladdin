<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ModuleGenerator extends Command
{
    const ERROR_MSG = 'Create module failed.';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:generate 
        {name : Class(singular), for example, User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Module operations';

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
     */
    public function handle()
    {
        $name = $this->argument('name');
        $argumentName = str_replace('/', '\\', $name);
        $nameArray = explode('/', $name);
        $moduleName = array_pop($nameArray);
        $path = implode('\\', $nameArray);
        if ($path) {
            $path = '\\' . $path;
        } else {
            $moduleName = $name;
        }
        $arguments = compact('argumentName', 'name', 'moduleName', 'path');

        $this->model($arguments);
        $this->controller($arguments);
        $this->request($arguments);
        $this->resource($arguments);
        $this->resourceCollection($arguments);

//        File::append(base_path('routes/api.php'), 'Route::resource(\'' . str_plural(strtolower($name)) . "', '{$name}Controller');");
    }

    /**
     * Get the stub file
     *
     * @param $type
     * @return false|string
     */
    protected function getStub(string $type)
    {
        return file_get_contents(resource_path("stubs/{$type}.stub"));
    }

    /**
     * Generate Class Model
     *
     * @param array $arguments
     */
    protected function model(array $arguments)
    {
        $modelTemplate = str_replace(
            [
                '{{path}}',
                '{{moduleName}}'
            ],
            [
                $arguments['path'],
                $arguments['moduleName']
            ],
            $this->getStub('Model')
        );

        if (!file_exists($path = app_path('/Models'))) {
            mkdir($path, 0777, true);
        }

        if (file_exists($file = app_path("/Models/{$arguments['moduleName']}.php"))) {
            $this->comment("The class Models/{$arguments['moduleName']} had been created.");
        } elseif (file_put_contents($file, $modelTemplate)) {
            $this->info("Create class {$arguments['moduleName']} Model successfully.");
        } else {
            $this->error(self::ERROR_MSG);
        }

    }

    /**
     * Generate Class Controller
     *
     * @param array $arguments
     */
    protected function controller(array $arguments)
    {
        $controllerTemplate = str_replace(
            [
                '{{path}}',
                '{{argumentName}}',
                '{{moduleName}}',
                '{{moduleNameLowerCaseFirst}}'
            ],
            [
                $arguments['path'],
                $arguments['argumentName'],
                $arguments['moduleName'],
                lcfirst($arguments['moduleName'])
            ],
            $this->getStub('Controller')
        );

        if (!file_exists($path = app_path('/Http/Controllers'))) {
            mkdir($path, 0777, true);
        }

        if (file_exists($file = app_path("/Http/Controllers/{$arguments['name']}Controller.php"))) {
            $this->comment("The class {$arguments['name']}Controller had been created.");
        } elseif (file_put_contents($file, $controllerTemplate)) {
            $this->info("Create class {$arguments['name']} Controller successfully.");
        } else {
            $this->error(self::ERROR_MSG);
        }

    }

    /**
     * Generate Class Request
     *
     * @param array $arguments
     */
    protected function request(array $arguments)
    {
        $requestTemplate = str_replace(
            [
                '{{path}}',
                '{{moduleName}}'
            ],
            [
                $arguments['path'],
                $arguments['moduleName']
            ],
            $this->getStub('Request')
        );

        if (!file_exists($path = app_path('/Http/Requests'))) {
            mkdir($path, 0777, true);
        }

        if (file_exists($file = app_path("/Http/Requests/{$arguments['name']}Request.php"))) {
            $this->comment("The class {$arguments['name']}Request had been created.");
        } elseif (file_put_contents($file, $requestTemplate)) {
            $this->info("Create class {$arguments['name']} Request successfully.");
        } else {
            $this->error(self::ERROR_MSG);
        }

    }

    /**
     * Generate Class Resource
     *
     * @param array $arguments
     */
    protected function resource(array $arguments)
    {
        $resourceTemplate = str_replace(
            [
                '{{path}}',
                '{{moduleName}}'
            ],
            [
                $arguments['path'],
                $arguments['moduleName']
            ],
            $this->getStub('Resource')
        );

        if (!file_exists($path = app_path('/Http/Resources'))) {
            mkdir($path, 0777, true);
        }

        if (file_exists($file = app_path("/Http/Resources/{$arguments['name']}Resource.php"))) {
            $this->comment("The class {$arguments['name']}Resource had been created.");
        } elseif (file_put_contents($file, $resourceTemplate)) {
            $this->info("Create class {$arguments['name']} Resource successfully.");
        } else {
            $this->error(self::ERROR_MSG);
        }

    }

    /**
     * Generate Class Resource
     *
     * @param array $arguments
     */
    protected function resourceCollection(array $arguments)
    {
        $resourceCollectionTemplate = str_replace(
            [
                '{{path}}',
                '{{moduleName}}'
            ],
            [
                $arguments['path'],
                $arguments['moduleName']
            ],
            $this->getStub('ResourceCollection')
        );

        if (!file_exists($path = app_path('/Http/Resources'))) {
            mkdir($path, 0777, true);
        }

        if (file_exists($file = app_path("/Http/Resources/{$arguments['name']}ResourceCollection.php"))) {
            $this->comment("The class {$arguments['name']}ResourceCollection had been created.");
        } elseif (file_put_contents($file, $resourceCollectionTemplate)) {
            $this->info("Create class {$arguments['name']} ResourceCollection successfully.");
        } else {
            $this->error(self::ERROR_MSG);
        }

    }

    protected function touchFile()
    {
        //
    }
}
