<h1>Интернет магазин на Laravel</h1>

<p>Пока что из функционала поиск и просмотр товаров, регистрация, вход/выход из аккаунта, смена пароля а так же возможность добавлять, просматривать и удалять обьекты из корзины.</p>

<p>В будущем планирую допилить функционал заказа а так же систему платежа.</p>

<ol>
    <p>1. Клонируйте репозиторий командой <pre><code>git clone https://github.com/Skelet1r/laravel_marketplace_api</code></pre> или как вам удобно.
    </p>
    <li><p>2. Затем перейдите в директорию проекта
        <pre><code>cd путь/к/проекту</code></pre></p>
        и выполните следующие команды:
        <p><pre><code>
composer install
php artisan migrate
php artisan key:generate
docker-compose up -d
php artisan db:seed
        </code></pre></p>
    </li>
    <li>3. Затем перейдите в вашем браузере по этому адрессу
        <p><pre><code>http://localhost:8085/</code></pre></p>
    </li>
</ol>

<p>Установка завершена!</p>
