# goMoto
goMoto is a booking app that allows users to book motorcycle product online and see orders history. Users need to create an account to access features.

## Run This
- Migrate
1. ```php artisan migrate```

- Seed
1. ```php artisan db:seed --class=RoleSeeder```
2. ```php artisan db:seed --class=UserSeeder```
3. ```php artisan db:seed --4. class=WorkshopSeeder```
5. ```php artisan db:seed --6. class=MotorcycleSeeder```
7. ```php artisan db:seed --class=BookingSeeder```


### Project 1
Objective:
• Showing PHP laravel skills
• Showing Relational database skills
• Showing software development cycle

Rules:
• Using Laravel migration for manipulating the database
• Allowed to use ORM for manipulating data

User Story:
1. As a user, I can register (With email confirmation)
2. As a user, I can login
3. As a user, I can edit my profile including my profile picture
4. As a admin, I can create, read, update, delete my product data
5. As a user, I can order a motorcycle product (With email summary order & using laravel queuing
systems)
6. As a user, I can see my orders (Indexing in database is a must)
7. As a user, I can cancel or delete my orders (With email delete or cancel order & using laravel
queuing systems)
8. As a user, I can export my orders to text file or excel file (xlsx, csv)
9. As a developer, I want to seed my database for master data (using laravel artisan command)
10. As a developer, I must create a database documentation in pdf
11. As a developer, I must create readme.md file to show how to run my website application 


### Project 2
Objective:
• Showing PHP laravel skills
• Showing logic skills
• Showing JSON manipulation Skills

Rules:
• Manipulate json file and return as an API endpoint
• Create many functions for manipulating data
• Create only 1 endpoint for this case
• Not allowed to use any database for this case

Repository invitation(Project 1 & 2)
Database documentation (Project 1)