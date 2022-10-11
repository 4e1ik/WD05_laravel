<?php

namespace App\Console\Commands;

use App\Http\Controllers\HelpController;
use App\Mail\CurrentMail;
use Illuminate\Console\Command;
use App\Http\Controllers\ConvertController;
use Illuminate\Support\Facades\Mail;

class GetCurrentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:current {howMany?} {--from=USD} {--to=EUR}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Currency conversion according to the National Bank of the Republic of Belarus';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        try {
//            if()
//        } catch ()
        $help = new HelpController();
        $howMany = $this->ask('Какое колличество денег вы хотите поменять?');

        $from = $this->choice('Какой валюты?(Аббревиатура или полное название, например USD или Доллар США)', $help->convAbb());
        $to = $this->choice('В какую валюту?(Аббревиатура или полное название, например EUR или Евро)', $help->convAbb());

        $convert = new ConvertController($howMany, $from, $to);

        $mailQ = $this->choice('Хотите отправить письмо на почту?', ['Да','Нет']);
        if($mailQ == 'Да'){
            $emailFriend = $this->ask('Введите почту, куда хотите отправить результат');
            try {
                if (!filter_var($emailFriend, FILTER_VALIDATE_EMAIL)){
                    throw new \Exception('Почта введена неверно');
                }
                $mail = new CurrentMail('Мои '.$howMany.' '.$from.' эквиваленты '.$convert->convertCommand().' '.$to.' курсу по НБРБ', $emailFriend);
                Mail::send($mail);
            } catch (\Exception $exception){
                $this->info($exception->getMessage());
            }

        }

        $this->info('Ваши '.$howMany.' '.$from.' эквиваленты '.$convert->convertCommand().' '.$to.' курсу по НБРБ');

    }
}
