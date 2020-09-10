<?php


namespace Masry\Lighthouse\Console;


use Illuminate\Console\GeneratorCommand;

class MakeFooCommand extends GeneratorCommand
{

    /**
     * @var string $name the signature of the command.
     */
    protected $name = "make:foo";

    /**
     * @var string $description Description of the command when listed using artisan.
     */
    protected $description = "Make a new Foo Class";

    /**
     * @var string $type Type of the class created by this command.
     */
    protected $type = "Foo";

    public function handle()
    {
        parent::handle(); // TODO: Change the autogenerated stub
        $this->doOtherOperations();
    }

    protected function doOtherOperations()
    {
        $class = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($class);

        $content = file_get_contents($path);

        file_put_contents($path, $content);
    }

    protected function getStub()
    {
        __DIR__ . "/stubs/foo.php.stub";
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        echo "Root namespace is: " . $rootNamespace;
        return $rootNamespace . "\Foo";
    }

}