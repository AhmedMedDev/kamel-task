## Roles & Permissions Module Documentation

The Roles & Permissions Module provides endpoints to manage roles and permissions within your application.

### Endpoints

#### 1. Get Roles with Permissions

- **Endpoint:** `GET /roles-with-permissions`
- **Description:** Retrieves all roles along with their associated permissions.
- **Response:**
  ```json
  {
      "payload": [
          {
              "role": "Role Name",
              "permissions": ["permission1", "permission2", ...]
          },
          ...
      ]
  }
  ```

#### 2. Get Permissions

- **Endpoint:** `GET /permissions`
- **Description:** Retrieves all available permissions.
- **Response:**
  ```json
  {
      "payload": ["permission1", "permission2", ...]
  }
  ```

#### 3. Give Permission

- **Endpoint:** `POST /give-permission`
- **Description:** Grants permissions to a user.
- **Request Parameters:**
  - `user_id`: ID of the user to grant permissions.
  - `permissions`: Array of permissions to grant.
- **Response:**
  - Status Code: 200 OK
  - Body:
    ```json
    {
        "message": "Permissions granted successfully"
    }
    ```

#### 4. Revoke Permission

- **Endpoint:** `POST /revoke-permission`
- **Description:** Revokes permissions from a user.
- **Request Parameters:**
  - `user_id`: ID of the user to revoke permissions.
  - `permissions`: Array of permissions to revoke.
- **Response:**
  - Status Code: 200 OK
  - Body:
    ```json
    {
        "message": "Permissions revoked successfully"
    }
    ```

### Request Validation Rules

- **Give Permission:**
  - `user_id`: Required, exists in the users table.
  - `permissions`: Required, array of distinct string values, each of which exists in the permissions table.
- **Revoke Permission:**
  - `user_id`: Required, exists in the users table.
  - `permissions`: Required, array of distinct string values, each of which exists in the permissions table.

### Middlewares

- **Authentication Middleware:** Ensures that the user is authenticated.
- **Admin Middleware:** Ensures that the user is an admin.

