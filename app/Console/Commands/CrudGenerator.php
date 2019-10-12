<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generator 
        {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD operations';

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
        $name = str_replace('/', '\\', $this->argument('name'));
        $nameArray = explode('\\', $name);
        $moduleName = array_pop($nameArray);
        $path = implode('\\', $nameArray);
        if ($path) {
            $path = '\\' . $path;
        } else {
            $moduleName = $name;
        }
        $arguments = compact('name', 'moduleName', 'path');

        $this->model($arguments);
        $this->controller($arguments);
        $this->request($arguments);
        $this->resource($arguments);
        $this->resourceCollection($arguments);

//        File::append(base_path('routes/api.php'), 'Route::resource(\'' . str_plural(strtolower($name)) . "', '{$name}Controller');");
        $this->info("Create {$name} module successfully.");
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

        file_put_contents(app_path("/Models/{$arguments['moduleName']}.php"), $modelTemplate);
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
                '{{name}}',
                '{{moduleName}}',
                '{{moduleNameLowerCaseFirst}}'
            ],
            [
                $arguments['path'],
                $arguments['name'],
                $arguments['moduleName'],
                lcfirst($arguments['moduleName'])
            ],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/{$arguments['name']}Controller.php"), $controllerTemplate);
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

        file_put_contents(app_path("/Http/Requests/{$arguments['name']}Request.php"), $requestTemplate);
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

        file_put_contents(app_path("/Http/Resources/{$arguments['name']}Resource.php"), $resourceTemplate);
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

        file_put_contents(app_path("/Http/Resources/{$arguments['name']}ResourceCollection.php"), $resourceCollectionTemplate);
    }
}
