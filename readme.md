#### Порядок установки
Подключить репозиторий в файле composer.json проекта
>     "repositories": [
>         {
>             "type": "git",
>             "url" : "packages/twoseven/subscriptions"
>         }
>     ],

Выполнить установку пакета
>       $ composer require twoseven/subscriptions 

Подключить поставщиков служб и алиасы(фасады) в приложении (добавить в массив настроек в `config/app.php`)
>       'providers' => [ 
>       // ...
>       TwigBridge\ServiceProvider::class,
>       TwoSeven\SubscriptionServiceProvider::class,
>       Collective\Html\HtmlServiceProvider::class
>       // ...
>       ]

>       'aliases' => [
>       // ...
>       'Twig' => TwigBridge\Facade\Twig::class,
>       'Form' => Collective\Html\FormFacade::class,
>       'Html' => Collective\Html\HtmlFacade::class,
>       // ...
>       ]

Опубликовать пакет и зависимости и выполнить миграцию БД: 
>       $ php artisan vendor:publish
>       $ composer dump-autoload
>       $ php artisan migrate

#### Заполнение таблиц
Для заполнения тестовыми данными таблицы пользователей выполнить следующие команды :
>       $ php artisan db:seed --class=UsersSeeder

Если нужно заполнить таблицу каналов - выполнить :
>       $ php artisan db:seed --class=ChannelsSeeder
>
>#### Маршруты
>       GET     /subscriptions/             - список пользователей
>       GET     /user/{id}/subscriptions/   - список подписок для пользователя
>       POST    /user/{id}/subscriptions/   - сохранение пакета подписки для пользователя.