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

2. **Move Project Files**:
    Place the project folder in the `htdocs` directory of your XAMPP installation:
    ```
    /c:/xampp/htdocs/job-portal-system/
    ```

3. **Start XAMPP**:
    - Open the XAMPP Control Panel.
    - Start the **Apache** and **MySQL** services.

4. **Create the Database**:
    - Open [phpMyAdmin](http://localhost/phpmyadmin).
    - Create a new database (e.g., `job_portal`).
    - Import the SQL file located in the `database` folder of the project:
      ```
      /database/job_portal.sql
      ```

5. **Configure Database Connection**:
    - Open the `config.php` file in the project directory.
    - Update the database credentials:
      ```php
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'job_portal';
      ```

6. **Access the Application**:
    - Open your browser and navigate to:
      ```
      http://localhost/job-portal-system/
      ```

## Features

- User registration and login
- Job posting and application
- Admin panel for managing users and jobs

## Troubleshooting

- Ensure Apache and MySQL are running in XAMPP.
- Verify database credentials in `config.php`.
- Check the browser console or PHP error logs for issues.

## License

This project is licensed under the [MIT License](LICENSE).

## Contributing

Feel free to submit issues or pull requests to improve the project.
