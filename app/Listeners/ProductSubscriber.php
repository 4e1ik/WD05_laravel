<?php


namespace App\Listeners;


use App\Events\ProductAddedEvent;
use Illuminate\Auth\Events\Registered;

class ProductSubscriber
{
    public function addHandler($event)
    {
        dd($event);
    }

    public function registredHandler($event)
    {
        dd($event);
    }

    /**
     * Зарегистрировать слушателей для подписчика.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
//     * @return void
     */


    public function subscribe($events)
    {
//        $events->listen(ProductAddedEvent::class, [ProductSubscriber::class, 'addHandler']);
//        $events->listen(Registered::class, [ProductSubscriber::class, 'registredHandler']);
        return [
            ProductAddedEvent::class => 'addHandler',
            Registered::class => 'registredHandler',
        ];
    }
}
