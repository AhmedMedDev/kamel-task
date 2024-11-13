# Authentication Module

The Authentication Module provides endpoints for user registration, login, logout, password management, social login, account verification, and deletion.

## Endpoints

### User Registration

#### Endpoint: `POST /auth/register`

Registers a new user.

**Request Parameters:**
- `name` (string, required): The name of the user.
- `phone` (string, required): The phone number of the user.
- `email` (string, required): The email address of the user.
- `password` (string, required): The password for the user's account.
- `device_name` (string, required): The name of the device used for registration.
- `user_type` (integer, required): The type of user. Accepted values: 1 (Customer), 2 (Supplier).
- `store_id` (integer, required if `user_type` is 1): The ID of the store associated with the user.

**Response:**
- Status Code: 201 Created
- Body:
  ```json
  {
      "message": "Registration completed successfully, proceed to the next step",
      "payload": {}
  }
  ```

### Social Account Registration

#### Endpoint: `POST /auth/social-register`

Registers a new user using social account credentials.

**Request Parameters:**
- `name` (string, required): The name of the user.
- `phone` (string, required): The phone number of the user.
- `email` (string, required): The email address of the user.
- `device_name` (string, required): The name of the device used for registration.
- `user_type` (integer, required): The type of user. Accepted values: 1 (Customer), 2 (Supplier).
- `store_id` (integer, required if `user_type` is 1): The ID of the store associated with the user.

**Response:**
- Status Code: 201 Created
- Body:
  ```json
  {
      "message": "Registration completed successfully, proceed to the next step",
      "payload": {}
  }
  ```

### User Login

#### Endpoint: `POST /auth/login`

Authenticates a user and generates a session token.

**Request Parameters:**
- `email` (string, required): The email address of the user.
- `password` (string, required): The password for the user's account.
- `device_name` (string, required): The name of the device used for login.

**Response:**
- Body:
  ```json
  {
      "payload": {}
  }
  ```

### Social Account Login

#### Endpoint: `POST /auth/social-login`

Authenticates a user using social account credentials and generates a session token.

**Request Parameters:**
- `email` (string, required): The email address of the user.
- `device_name` (string, required): The name of the device used for login.

**Response:**
- Body:
  ```json
  {
      "payload": {}
  }
  ```

### User Logout

#### Endpoint: `POST /auth/logout`

Logs out the current user and invalidates the session token.

**Response:**
- Body:
  ```json
  {
      "message": "You have been successfully logged out!"
  }
  ```

### Change Password

#### Endpoint: `POST /auth/change-password`

Changes the password of the current user.

**Request Parameters:**
- `old_password` (string, required): The current password of the user.
- `password` (string, required): The new password for the user's account.
- `password_confirmation` (string, required): Confirmation of the new password.

**Response:**
- Body:
  ```json
  {
      "message": "Password has been changed successfully"
  }
  ```

### Reset Password

#### Endpoint: `POST /auth/reset-password`

Resets the password of the user.

**Request Parameters:**
- `code` (string, required): The verification code sent to the user.
- `password` (string, required): The new password for the user's account.

**Response:**
- Body:
  ```json
  {
      "message": "Password has been changed successfully"
  }
  ```

### Verify Account

#### Endpoint: `POST /auth/verify-account`

Verifies the user account using a verification code.

**Request Parameters:**
- `code` (string, required): The verification code sent to the user.

**Response:**
- Body:
  ```json
  {
      "message": "Verification successful"
  }
  ```

### Delete Account

#### Endpoint: `DELETE /auth/delete-account`

Deletes the account of the current user.

**Response:**
- Body:
  ```json
  {
      "message": "Account deleted successfully"
  }
  ```

## Validations

Validation rules are applied to each endpoint to ensure data integrity and security. Please refer to the respective endpoint descriptions for details on required parameters and validation rules.

## Enums

- `UserTypesEnum`: Defines the different types of users:
  - `CUSTOMER`: 1
  - `SUPPLIER`: 2