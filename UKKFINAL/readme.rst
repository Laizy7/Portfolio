After download the project folder, please import provided database name 'ukkfinal.sql' to database with name ukkfinal

To go login page, go to this url
http://localhost/ukkfinal/

To login as Guest/Client
-> Nama : tamu1
-> Password : tamu1

To login as Admin
-> Nama : admin
-> Password : admin

To login as Receptionist
-> Nama : rsp
-> Password : rsp

Before, I used PHP ver 7, but in PHP ver 8 there are some configs in this project 
I added #[\AllowDynamicProperties] to /system/core/Controller.php, Loader.php, Router.php, Security.php, URI.php
and at /system/core/DB_driver.php
Also changed the $db['default']['hostname'] => 'localhost' to $db['default']['hostname'] => '127.0.0.1'

I use XAMPP and phpMyAdmin