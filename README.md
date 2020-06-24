# Laravel & Vue Todo App
## Ön Hazırlık
* Öncelikle mysql veritabanı üzerinde todoapp adında bir veritabanı oluşturuyoruz.
* .env dosyasını konfigüre ediyoruz.
* composer ve node kurulumlarını yapıyoruz.
### Kurulum

```sh
$ git clone https://github.com/rasitekrem/laravelvue-todoapp.git
$ cd laravelvue-todoapp
$ composer install
$ npm install
```
Temel kurulumları bu şekilde yapıyoruz.
.env dosyasına veritabanı bilgilerini girdiğinizi varsayıyorum.
```
php artisan migrate
```
komutunu yazarak veritabanındaki tabloları oluşturuyoruz.

```
php artisan db:seed
```
komutu ile bir kullanıcı oluşturuyoruz.
* email: demo@mail.com
* password: demo123

Ardından yapmamız bir application key generate ediyoruz;
```
php artisan key:generate
```
Authentication yapısını kullanabilmemiz için Laravel Passport'un keylerini oluşturalım;
```
php artisan passport:install
```
Son olarak resource kısmındaki kodların public kısmına dönüştürülmesi için webpack'i kullanmamız lazım.
```
npm run dev
```
ya da
```
npm run watch
```
ile bu işlemi yapabiliriz. watch ile resource kısmındaki değişiklikler anında public kısmına dönüştürülür.

İşlemler tamamlandığına göre projeyi ayağa kaldırabiliriz;

```
php artisan serve
```
## Teknolojiler
### Frontend
* Vue
* Vuex
* Vuetify
* Vue Router
* Axios

### Backend

* Php
* Laravel 6
* Laravel Passport
* MySQL
