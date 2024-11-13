## Employees Module Documentation

The Employees Module enables the management of employees within your application.

### Endpoints

#### 1. Get Employees

- **Endpoint:** `GET /employees`
- **Description:** Retrieves all employees.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "store_id": 1,
              "code": "EMP_abc123",
              "created_at": "YYYY-MM-DD HH:MM:SS",
              "updated_at": "YYYY-MM-DD HH:MM:SS"
          },
          ...
      ]
  }
  ```

#### 2. Create Employee

- **Endpoint:** `POST /employees`
- **Description:** Creates a new employee.
- **Request Body:**
  ```json
  {
      "store_id": 1
  }
  ```
- **Response:**
  ```json
  {
      "message": "created successfully",
      "payload": {
          "id": 1,
          "store_id": 1,
          "code": "EMP_abc123",
          "created_at": "YYYY-MM-DD HH:MM:SS",
          "updated_at": "YYYY-MM-DD HH:MM:SS"
      }
  }
  ```

#### 3. Update Employee

- **Endpoint:** `PUT /employees/{employee_id}`
- **Description:** Updates an existing employee.
- **Request Body:**
  ```json
  {
      "store_id": 2
  }
  ```
- **Response:**
  ```json
  {
      "message": "updated successfully"
  }
  ```

#### 4. Delete Employee

- **Endpoint:** `DELETE /employees/{employee_id}`
- **Description:** Deletes an existing employee.
- **Response:**
  ```json
  {
      "message": "deleted successfully"
  }
  ```

### Model: Employee

#### Attributes

- `id`: The unique identifier for the employee.
- `store_id`: The ID of the store to which the employee belongs.
- `code`: A unique code assigned to the employee.
- `created_at`: The timestamp indicating when the employee was created.
- `updated_at`: The timestamp indicating when the employee was last updated.

#### Relationships

- `store()`: Belongs to a store.
- `user()`: Morphs one user.

### Request Validation Rules

- **Creation:**
  - `store_id`: Required, must exist in the `stores` table.

- **Update:**
  - `store_id`: Must exist in the `stores` table.

