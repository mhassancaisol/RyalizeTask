Hi,
You’re free use any PHP framework or work in core PHP.


I have used Laravel (9) to perform this task

Composer2 create-project --prefer-dist laravel/laravel ryaltask

I have three major migration 

User (with basic date id,name,email,password,dates)
Transaction (with FK user_id and location_id)
Location

As per second task requirement I have used seeder Laravel for data dump upto 100K records
With basic three seeders
User/Transaction/LocationSeeder



REST APIs for User (Basic CURD)

Get 
https://payroll.caisol.com/api/users

https://payroll.caisol.com/api/users/1
Single user by ID
https://payroll.caisol.com/api/users?per_page=100&page=1
default is 100 records per page

PUT 
https://payroll.caisol.com/api/users
{
Name:”ABC”
Email:”abc@yopmail.com”
Password:”Abc@321!”
}

POST
https://payroll.caisol.com/api/users
{
Name:”ABC”
Email:”abc@yopmail.com”
id:”1”
}

DELTE passing id

https://payroll.caisol.com/api/users/1


USED Jquery bootstrap to show some basic action for UI and understanding 
For APIs
Add and load data through pagination 



API to get total transaction against data and Location ID
GET total transactions count against date/location id /user ID 
https://payroll.caisol.com/api/total-transactions?date=2024-10-26&location_id=4156&user_id=4156

Opitmization for DB
ALTER TABLE `transactions` ADD INDEX `user_id_index` (`user_id`)
ALTER TABLE `transactions` ADD INDEX `location_id_index` (`location_id`)

Security 
CRF protection 
X-CSRF-TOKEN

Data request validation 
$request->validated();
Rules before interaction with logic
Escape techniques
rate limitations
used query builder 
Env file to prevent connectivity

Route throttle
![Uploading image.png…]()
