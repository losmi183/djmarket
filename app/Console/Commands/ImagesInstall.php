<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ImagesInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy Dummy Products Images from public to storage and create link';

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
        // Delete folder if exists
        File::deleteDirectory(public_path('storage/products'));

        // Create Link to Storage / Calling existind artisan commnad
        $this->call('storage:link');

        // Copy all folder content to new location
        $copySuccess = File::copyDirectory(public_path('img/products'), public_path('storage/products'));
        
        if($copySuccess) {
            $this->info('Images successfully copied to storage folder');
        }

    }
}
