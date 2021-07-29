# TwitterScheduler
<a href="https://github.com/andrea-emmanuele/TwitterScheduler/blob/master/LICENSE">
    <img src="https://img.shields.io/github/license/tailwindcomponents/dashboard-template">
</a>
<br />
<br />

Live [Demo](https://twitterscheduler.andreaemmanuele.it)

## Framework utilizzati

- [Vue 3](https://v3.vuejs.org/) (javascript)
- [Laravel 8](https://laravel.com/) (php)
- [Tailwind](https://tailwindcss.com/) (css)

## Altro

- [Vuex](https://vuex.vuejs.org/) (State Management)
- [Amazon S3](https://aws.amazon.com/it/s3/) (File Storage)

## Installazione
- **Clonare la repo**
  <br />
  <br />
```git clone https://github.com/andrea-emmanuele/TwitterScheduler.git```
  <br />
  <br />
- **Installare le dipendenze**
  <br />
  <br />
  ```npm install & composer install```
  <br />
  <br />
- **Compilare gli assets**
  <br />
  <br />
  ```npm run dev```
  <br />
  <br />
- **Rinominare il file .env.example in .env e settare il database (è necessario creare prima un db in locale)**
  <br />
  ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_del_tuo_database
    DB_USERNAME=tuo_username
    DB_PASSWORD=tua_password
  ```
  
- **Generare una random key**
  <br />
  <br />
  ```php artisan key:generate```
  <br />
  <br />
- **Runnare le migrations**
  <br />
  <br />
  ```php artisan migrate --seed```
  <br />
  <br />
  
L'applicazione è ora pronta all'uso.\
Per la pubblicazione delle immagini nei tweet è necessario disporre di un account amazon aws e inserire le credenziali nel file .env

```
    AWS_ACCESS_KEY_ID=access_key
    AWS_SECRET_ACCESS_KEY=secret_access_key
    AWS_DEFAULT_REGION=eu-central-1
    AWS_BUCKET=nome_bucket_s3
    AWS_USE_PATH_STYLE_ENDPOINT=false
```


## Anteprima delle funzionalità

- **Pubblicare un tweet** 
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291813-694x370.gif">
  <br/>
  <br/>
- **Programmare la pubblicazione di un tweet**
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291823-685x431.gif">
  <br/>
  <br/>
- **Visualizzazione dei tweets programmati**
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291823-682x596.gif">
  <br/>
  <br/>
- **Eliminare uno o più tweets non ancora inviati**
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291923-695x596.gif">
  <br/>
  <br/>
- **Line breaks**
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291833-703x370.gif">
  <br/>
  <br/>
- **Link**
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291835-695x380.gif">
  <br/>
  <br/>
- **Hashtags**
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291839-695x320.gif">
  <br/>
  <br/>
- **Menzioni**
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291839-695x326.gif">
  <br/>
  <br/>
- **Integrare un'immagine al tweet**
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291844-729x838.gif">
  <br/>
  <br/>
- **Gestione degli eventi**
  <br/>
  <br/>
  a. Validazione del contenuto del tweet
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291916-695x311.gif"> 
  <br/>
  <br/>
  b. Popups
  <br/>
  <br/>
  <img src="https://raw.githubusercontent.com/andrea-emmanuele/TwitterScheduler/master/functionalities/CPT2107291916-696x209.gif">
  <br/>
  <br/>
- ... ed altro


