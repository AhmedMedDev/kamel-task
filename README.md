# Project Installation and Testing Guide

## Try the App

You can try the app by visiting [https://kamel.meder.tech/](https://kamel.meder.tech/)

You can log in with the following credentials:

- **Manager**
    - Email: `manager@example.com`
    - Password: `password`

- **Employee**
    - Email: `employee@example.com`
    - Password: `password`

## Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/AhmedMedDev/kamel-task.git
    cd kamel-task
    ```

2. **Install dependencies:**
    Make sure you have [Composer](https://getcomposer.org/) installed, then run:
    ```bash
    composer install
    ```

3. **Set up environment variables:**
    Copy the `.env.example` file to `.env` and update the necessary environment variables.
    ```bash
    cp .env.example .env
    ```

4. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5. **Run database migrations:**
    ```bash
    php artisan migrate --seed
    ```

6. **Start the development server:**
    ```bash
    php artisan serve
    ```

## Running Tests

1. **Run the test suite:**
    Run all test cases in the test suite to ensure everything is working as expected:
    ```bash
    php artisan test
    ```

2. **Run a specific test case:**
    If you need to run a specific test case (e.g., for a specific API endpoint), use the `--filter` option. For example, to test the registration endpoint, you can use:
    ```bash
    php artisan test --filter test_registration_endpoint
    ```

    This allows you to target specific functionality and ensures faster debugging without running the entire test suite.

3. **Explanation:**
    Although a Postman collection was not created due to time constraints, the provided test cases cover all the necessary functionality. By running these tests individually using the `--filter` option, the reviewer can validate each endpoint effectively.

4. **Benefits of the current approach:**
    - Ensures automated testing directly in the development environment.
    - Provides a quick way to pinpoint issues for specific features or endpoints.
    - Removes the dependency on external tools like Postman for testing API functionality.
