<?php


namespace Masry\Lighthouse\Console;


use Illuminate\Console\Command;

class InstallLighthousePackage extends Command
{

    /**
     * @var string Signature to invoke the command.
     */
    protected $signature = "lighthouse:install";

    /**
     * @var string Description to appear on artisan command line tool.
     */
    protected $description = "Install the Lighthouse package";


    public function handle()
    {
        $this->info("Installing Lighthouse package...");

        $this->info("Publishing Configuration");

        $this->call('vendor:publish', [
            '--provider' => "Masry\Lighthouse\LighthouseServiceProvider",
            "--tag" => "config"
        ]);

        $this->info("Lighthouse Installed Successfully");
    }
}
