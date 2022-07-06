# CodeIgniter CRUD
Just a simple CRUD (Create, Read, Update, Delete) with CodeIgniter Framework.

## How to install
1. Clone/Download this repo to your local server
   - XAMPP: path/to/xampp/htdocts
2. Configure database setting at `application\config\database.php` (hostname, username, password)
3. Change `base_url` setting at `application\config\config.php` to `http://localhost/ci-crud`
4. Import `DB.sql` to your SQL server `(e.g. with phpMyAdmin)`
5. Just open your browser and accessing it `(e.g. http://localhost/ci-crud)`

## Features

#### Create .docx document from template (PHPWord Example) @2022-07-06

This example use `phpoffice/phpword` library, and will generate the document from template. Try it from the **Example > PHPWord** sidebar menu.

#### DataTables Server-side @28-04-2022

There are some commits for this examples, including bugs fix.
- [1] 52db53ee030f7b2291c852628dc877c41f3f4c56
- [2] 84c535aa05ed1badc5bafaaad227df07a1567173
- [3] 5ffde0a4df18a84f60eb706f6f0a367da86dfada

#### Simple Auth @2019-12-19

Please use `DB-with-auth.sql` to make auth working.
This auth feature is very simple, take a look to these files.
- `application/config/autoload.php`
- `application/controllers/Auth.php`
- `application/helpers/auth_helper.php`
- `application/views/users/login-form.php`

Try! Open your browser and access post controller `(http://localhost/ci-crud/post)`.

#### Generate PDF with DOMPDF @2019-02-19

After install, please do the following steps:
1. Install dompdf library
   - Open CMD/Terminal, go to `application` folder and run `composer install`
2. Create new directory at `assets/pdf-outputs` and make it writable
3. Open `YOU_BASE_URL/index.php/example/dompdf`
4. You are done!
