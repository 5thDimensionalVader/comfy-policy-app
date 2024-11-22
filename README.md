# Comfy Policy App

A simple Laravel-based web application for managing insurance policies where users
can create, update, delete, and view policy records. Implement features for user authentication,
role-based access, and an API endpoint for listing policies.

## Requirements

- PHP 8.x
- Composer

## Installation

1. Clone the repository using `https://github.com/5thDimensionalVader/comfy-policy-app.git`.
2. Run `composer install` to install the dependencies. Also run `npm install && npm run build` to install the dependencies and build for the frontend.
3. Create an `.env` file in the root directory based on the `.env.example` file.
4. Run `php artisan migrate` to create the database tables.
5. To seed the database, run `php artisan db:seed --class=PolicySeeder` for policies and `php artisan db:seed --class=UserSeeder` for users.
6. Run the new `composer run dev` to start the development server for both Laravel and Vite.
7. Open `http://localhost:8000` in your browser to access the application.

## Usage

1. Register or log in using the provided registration form & login form.
2. Create a new policy by clicking on "Create Policy" at the top right corner of the page.
3. Update or delete a policy by clicking the "Edit" or "Delete" buttons next to the policy record. Only admin users can delete policies.
4. View a policy by clicking the "View" button next to the policy record.
5. Use the search functionality to find a specific policy by entering the policy number or customer name.

## Features

- User authentication and role-based access (default role is `agent`).
- Create, update, delete, and view policy records.
- API endpoint for listing policies with filtering options.
- Search functionality based on policy number or customer name.

## Limitations

- The `start_date` and `end_date` in the API endpoint might not be working as expected.
- No unit tests for API and core functionalities.
