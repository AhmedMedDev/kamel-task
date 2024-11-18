# Project Installation and Testing Guide

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
    php artisan migrate
    ```

6. **Start the development server:**
    ```bash
    php artisan serve
    ```

## Running Tests

1. **Run the test suite:**
    ```bash
    php artisan test
    ```

2. **Check code coverage (optional):**
    If you have Xdebug installed, you can generate a code coverage report:
    ```bash
    php artisan test --coverage
    ```

For any issues or contributions, please refer to the [CONTRIBUTING.md](CONTRIBUTING.md) file.
