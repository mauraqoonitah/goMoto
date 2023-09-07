# goMoto
goMoto is a booking app that allows users to book motorcycle product online and see orders history. Users need to create an account to access features.

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.
### Installation
Download zip / Clone the repo ```https://github.com/mauraqoonitah/goMoto.git```

## Running Application
- Migrate Database  ```php artisan migrate```

- Seed Database
1. ```php artisan db:seed --class=RoleSeeder```
2. ```php artisan db:seed --class=UserSeeder```
3. ```php artisan db:seed --4. class=WorkshopSeeder```
4. ```php artisan db:seed --6. class=MotorcycleSeeder```
5. ```php artisan db:seed --class=BookingSeeder```

## Database design
<img src="./screenshot/db_designer.png" width="600" />

## Screenshot GoMoto (user)
#### Landing Page
<img src="./screenshot/ss_1.png" width="600" />

#### Register & Login
<img src="./screenshot/ss_2.png" width="600" />
<img src="./screenshot/ss_3.png" width="600" />

#### Edit profile
<img src="./screenshot/ss_6.png" width="600" />

#### Order a motorcycle product 
<img src="./screenshot/ss_4.png" width="600" />

#### See my orders (Booking details, cancel or delete bookings)
<img src="./screenshot/ss_5.png" width="600" />

## Screenshot GoMoto (admin)

#### Dashboard Admin
<img src="./screenshot/ss_admin_1.png" width="600" />

#### Show, Update, Delete Workshops List
<img src="./screenshot/ss_admin_2.png" width="600" />

#### Create new workshop
<img src="./screenshot/ss_admin_3.png" width="600" />

#### Show, Update, Delete products of workshop
<img src="./screenshot/ss_admin_4.png" width="600" />

### Create new products of workshop
<img src="./screenshot/ss_admin_5.png" width="600" />
