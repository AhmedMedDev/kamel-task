# OnShop API Documentation

## Table of Contents

- [OnShop API Documentation](#onshop-api-documentation)
  - [Table of Contents](#table-of-contents)
  - [Overview](#overview)
  - [Project Status](#project-status)
  - [Progress](#progress)
    - [Completed](#completed)
    - [In Progress](#in-progress)
  - [Blockers](#blockers)
  - [To-Do](#to-do)
  - [Dependencies](#dependencies)
  - [Installation](#installation)
  - [Testing](#testing)
  - [Endpoints](#endpoints)
  - [Changelog](#changelog)
  - [Contributing](#contributing)
    - [Service Repository Pattern](#service-repository-pattern)
    - [Unit Testing](#unit-testing)
    - [Laravel Expertise](#laravel-expertise)
    - [Pull Requests](#pull-requests)
    - [Code Review](#code-review)
    - [Boost Filter Behavior](#boost-filter-behavior)

## Overview

Briefly describe the purpose and goals of the project.

## Project Status

Provide an overall status update of the project.

- **Current Version:** X.X.X
- **Last Update:** DD/MM/YYYY
- **Environment:** Production / Development

## Progress
Outline the completed tasks, ongoing work, and any work planned for the near future.

### Completed

- [x] Feature 1
- [x] Feature 2
- [x] Bug fixes

### In Progress

- [ ] Feature 3
- [ ] Feature 4

## Blockers

List any issues or blockers that are hindering progress.

- Issue 1: Describe the issue and current status.
- Issue 2: Describe the issue and current status.

## To-Do

List upcoming tasks and features planned for the future.

- Task 1: Description of the task.
- Task 2: Description of the task.

## Dependencies

List all external dependencies, libraries, and tools required for the project.

- Laravel Framework: X.X
- MySQL: X.X
- ...

## Installation

Provide instructions for setting up the development environment.

```bash
composer install
php artisan migrate
```

## Testing

```bash
php artisan test
```

## Endpoints

List all API endpoints with brief descriptions.

<!-- - `GET /api/endpoint1`: Description of the endpoint. -->
<!-- - `POST /api/endpoint2`: Description of the endpoint. -->

## Changelog

Keep a record of changes made to the project.

## Contributing

We welcome contributions from the team to enhance the project. Please follow these guidelines to ensure consistency, maintainability, and smooth collaboration.

### Service Repository Pattern

- Utilize the Service Repository pattern for implementing business logic.
- Keep service classes focused on a specific domain and ensure they interact with repositories for data operations.
- Use repositories for database interactions and keep them separate from the services.

### Unit Testing

- Write comprehensive unit tests for your code. Ensure that tests cover all critical paths and edge cases.
- Follow the PHPUnit testing framework for writing tests.
- Run tests locally before submitting a pull request to catch and fix issues early.

### Laravel Expertise

- Leverage Laravel features and conventions to maintain a clean and consistent codebase.
- Document any Laravel-specific design decisions or configurations in the code.
- Use Laravel migrations for database changes and provide seed data for testing.

### Pull Requests

- Fork the repository, create a new branch for your feature or bug fix, and submit a pull request.
- Clearly describe the purpose of your pull request and any changes made.
- Reference any relevant issues in your pull request description.
- Ensure that your branch is up-to-date with the latest changes from the main branch.

### Code Review

- Participate in code reviews actively and respond to feedback promptly.
- Be open to suggestions and improvements from other team members.
- Follow the team's coding standards and best practices during the review process.

By following these guidelines, we aim to maintain a high level of code quality, consistency, and collaboration within the team. Thank you for your contributions!

### Boost Filter Behavior

1. Update ```Resolve.php```
```bash
nano .\vendor\abbasudo\laravel-purity\src\Filters\Resolve.php
```

replace 

```php
private function validateField(string $field): void
{
    $availableFields = $this->model->availableFields();

    if (!in_array($field, $availableFields)) {
        throw FieldNotSupported::create($field, $this->model::class, $availableFields);
    }
}
```

with 

```php
private function validateField(string $field): void
{
    $availableFields = $this->model->availableFields();

    if (!in_array($field, $availableFields) && !str_contains($field, '->')) {
        throw FieldNotSupported::create($field, $this->model::class, $availableFields);
    }
}
```

2. Update ```Filterable.php```

```bash
nano .\vendor\abbasudo\laravel-purity\src\Traits\Filterable.php
```

replace 
```php
public function getField(string $field): string
{
    return $this->realName(($this->renamedFilterFields ?? []) + $this->availableFields(), $field);
}
```

with 

```php
public function getField(string $field): string
{
    return str_contains($field, '->') ? $field : $this->realName(($this->renamedFilterFields ?? []) + $this->availableFields(), $field);
}
```