<?php

namespace Timedoor\ImageProcessing\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'imgproc:install';

    protected $description = 'Install image processing module';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $choice = $this->choice(
            'Which module image processing you want to use?',
            [
                'Image Processing (JQuery)',
                'Image Processing (VueJS)'
            ],
            0
        );

        switch ($choice) {
            case 'Image Processing (JQuery)':
            {
                (new Filesystem)->ensureDirectoryExists(public_path('js'));
                (new Filesystem)->ensureDirectoryExists(public_path('css'));
                (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));

                (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/css', public_path('css'));
                (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/js', public_path('js'));
                (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/views/components', resource_path('views/components'));
                break;
            }
            case 'Image Processing (VueJS)':
            {
                $this->info('Under development, stay tune!');
                break;
            }
            default:
            {
                $this->info('Unknown choice.');
                break;
            }
        }
    }

    protected function addClientSide()
    {
        
    }
}