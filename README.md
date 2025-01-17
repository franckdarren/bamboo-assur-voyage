
## Installation

`cp .env.example .env`

`php artisan migrate`

`composer install`

`npm install`

`php artisan migrate:fresh --seed`

`php artisan serve` and `npm run dev`

Pour lancer serveur maildev après installation.
`maildev`

Dans le fichier .env modifier comme suit :
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@gateway-market.com
MAIL_FROM_NAME="${APP_NAME}"


Admin
identifiant : admin@admin.com
password : password

Superviseur 
identifiant : superviseur@superviseur.com
password : password

Pour lancer la commande qui traite les workers
`php artisan queue:work`


