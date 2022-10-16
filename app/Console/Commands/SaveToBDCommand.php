<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Helpers\SaveToTableClass;;

class SaveToBDCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:current';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $saveToDB = new SaveToTableClass();
            $saveToDB->save();
            if ($saveToDB->save() == 0){
                throw new \Exception('Ошибка ответа сервера');
            }
        } catch (\Exception $exception){
            $this->info($exception->getMessage());
        }
    }
}
