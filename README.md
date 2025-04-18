Delivery App Project
Project Overview
Delivery App is a Laravel-based application that allows clients to create delivery requests, drivers to manage deliveries, and admins to oversee the entire delivery operation.

Setup Instructions
Clone the repository
```bash
git clone https://github.com/friend-username/repo-name.git
Navigate to the project folder
bash
Copy
Edit
cd repo-name
Create your .env file
Copy the example .env file and update your local credentials:

bash
Copy
Edit
cp .env.example .env
Install PHP dependencies
bash
Copy
Edit
composer install
Install Node.js dependencies
bash
Copy
Edit
npm install
Build frontend assets
bash
Copy
Edit
npm run dev
Generate the application key
bash
Copy
Edit
php artisan key:generate
Set up your database
Create a new database (e.g., deliverydb) in your local MySQL server.

Update your .env file database section if necessary.

Then run the migrations:

bash
Copy
Edit
php artisan migrate
Serve the application
bash
Copy
Edit
php artisan serve
Important Notes
Email Verification:
After registering, users must verify their email address before accessing the dashboard.

Mailtrap SMTP:
Each developer should create their own free Mailtrap.io account and update the SMTP credentials inside their .env file.

User Roles:
Users can register as Clients or Drivers during registration. Admins are manually managed.

Project Features (Phase 1)
Client registration, login, and email verification

Driver registration with vehicle details

Admin management of drivers and deliveries (upcoming)

Delivery creation and status tracking (upcoming)

Loyalty points system for drivers (upcoming)

Team Members
[Adam Kadri]
[hadi rhimi]
[charbel kassouf]
[jad kassouf]
[goerge mousally]

License
This project is open-sourced under the MIT License