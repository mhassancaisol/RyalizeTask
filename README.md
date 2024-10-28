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



POST https://payroll.caisol.com/api/login (can not request more than 10 request per window)
with 
{
email=gregorio29@example.net,
password=Test Password

}
 
to get jwt token

Response you may get 
{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3BheXJvbGwuY2Fpc29sLmNvbS9hcGkvbG9naW4iLCJpYXQiOjE3MzAxMzk1ODgsImV4cCI6MTczMDE0MzE4OCwibmJmIjoxNzMwMTM5NTg4LCJqdGkiOiJhZGYwY1BoeTZlVEpENnJ3Iiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.ZSIrMXW4U82lJZzm0ls5ic7-n56RhNWbFUu7BQkDpVs"}
<img width="1440" alt="Screenshot 2024-10-28 at 11 38 32 PM" src="https://github.com/user-attachments/assets/e42d37a9-1d32-430f-9f0f-ee1e1310ef81">

REST APIs for User (Basic CURD)

Each time you request with token passing 
Authorization : Bearer {token string}

Get 
https://payroll.caisol.com/api/users

https://payroll.caisol.com/api/users/1
Headers 
{
Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3BheXJvbGwuY2Fpc29sLmNvbS9hcGkvbG9naW4iLCJpYXQiOjE3MzAxMzk1ODgsImV4cCI6MTczMDE0MzE4OCwibmJmIjoxNzMwMTM5NTg4LCJqdGkiOiJhZGYwY1BoeTZlVEpENnJ3Iiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.ZSIrMXW4U82lJZzm0ls5ic7-n56RhNWbFUu7BQkDpVs
}
![Uploading Screenshot 2024-10-28 at 11.38.32 PM.png…]()

with each request
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
<img width="1440" alt="Screenshot 2024-10-28 at 11 37 40 PM" src="https://github.com/user-attachments/assets/cf6c05de-9a0a-4138-99d2-eab867edbeeb">

 
Opitmization for DB
ALTER TABLE `transactions` ADD INDEX `user_id_index` (`user_id`)
ALTER TABLE `transactions` ADD INDEX `location_id_index` (`location_id`)

Security 
JWT
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
![image](https://github.com/user-attachments/assets/09637942-73cd-4075-9e4d-e1e7ed826724)
