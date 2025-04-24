# Job Portal System

This README provides instructions to set up and run the Job Portal System project.

## Prerequisites

Ensure you have the following installed:
- [XAMPP](https://www.apachefriends.org/index.html) (PHP, MySQL, Apache)
- A web browser
- Git (optional, for cloning the repository)

## Setup Instructions

1. **Clone the Repository**:
    git clone https://github.com/your-repo/job-portal-system.git

2.  **Create .env file**  
    cp .env.example .env

3. **Configure your db in .env file**

4. **Run command to install vendor and npm modules**
    composer install
    npm install
5. **Generate key by running command**
    php artisan key:generate

6. **Migrate database**
    php artisan migrate

7. **Seed database**
    php artisan db:seed

8. **Run server**
    composer run dev

 -- User Login: http://127.0.0.1:8000/login
 -- Employer Login: http://127.0.0.1:8000/employer/login
 -- Admin Login: http://127.0.0.1:8000/admin/login
