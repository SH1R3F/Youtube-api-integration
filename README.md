# Youtube api integration
<p>In this project I aimed to practice the following</p>
<ul>
    <li>Authentication with Jetstream</li>
    <li>Authentication via social networks. Google, linkedin, and github logins are implemented</li>
    <li>Integrating youtube api</li>
</ul>

## Installation
Don't forget to update environment variables in `.env` file
`cp .env.example .env`

Install dependencies by running this code
`composer install`

run the following commands to get the application started
`php artisan key:generate`
`php artisan migrate:fresh --seed`

To add new providers for socialite add your provider configuration to `config/services.php`
and modify the `redirect` and `callback` routes in `router/web.php` to accept your provider
