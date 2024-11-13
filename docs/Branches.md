# Branches Module

The Branches Module allows you to manage branches associated with stores. This includes creating, updating, and deleting branches, as well as attaching and detaching products to/from branches.

## Endpoints

### Get All Branches

#### Endpoint: `GET /branches`

Retrieves a list of all branches.

**Response:**
- Body:
  ```json
  {
      "payload": [
          {
              "id": 1,
              "store_id": 1,
              "city_id": 1,
              "lat": 123.456,
              "lang": 789.123,
              "name": "Branch Name",
              "phone": "+1234567890",
              "email": "branch@example.com",
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

### Create Branch

#### Endpoint: `POST /branches`

Creates a new branch.

**Request Parameters:**
- `store_id` (integer, required): ID of the store the branch belongs to.
- `city_id` (integer, required): ID of the city where the branch is located.
- `lat` (numeric, required): Latitude coordinate of the branch location.
- `lang` (numeric, required): Longitude coordinate of the branch location.
- `name` (string, required): Name of the branch.
- `phone` (string, required): Phone number of the branch.
- `email` (string, required): Email address of the branch.

**Response:**
- Status Code: 201 Created
- Body:
  ```json
  {
      "message": "Created successfully",
      "payload": {}
  }
  ```

### Update Branch

#### Endpoint: `PUT /branches/{branch_id}`

Updates an existing branch.

**Request Parameters:**
- `city_id` (integer, optional): ID of the city where the branch is located.
- `lat` (numeric, optional): Latitude coordinate of the branch location.
- `lang` (numeric, optional): Longitude coordinate of the branch location.
- `name` (array, optional): Name of the branch.
- `phone` (string, optional): Phone number of the branch.
- `email` (string, optional): Email address of the branch.

**Response:**
- Body:
  ```json
  {
      "message": "Updated successfully"
  }
  ```

### Delete Branch

#### Endpoint: `DELETE /branches/{branch_id}`

Deletes an existing branch.

**Response:**
- Body:
  ```json
  {
      "message": "Deleted successfully"
  }
  ```

### Attach Product to Branch

#### Endpoint: `POST /branches/{branch_id}/products`

Attaches products to a branch.

**Request Parameters:**
- `products` (array, required): Array of product IDs to be attached to the branch.

**Response:**
- Body:
  ```json
  {
      "message": "Attached successfully"
  }
  ```

### Detach Product from Branch

#### Endpoint: `DELETE /branches/{branch_id}/products`

Detaches products from a branch.

**Request Parameters:**
- `products` (array, required): Array of product IDs to be detached from the branch.

**Response:**
- Body:
  ```json
  {
      "message": "Detached successfully"
  }
  ```

## Model

The Branch model contains the following attributes:
- `id`: The ID of the branch.
- `store_id`: ID of the store the branch belongs to.
- `city_id`: ID of the city where the branch is located.
- `lat`: Latitude coordinate of the branch location.
- `lang`: Longitude coordinate of the branch location.
- `name`: Name of the branch.
- `phone`: Phone number of the branch.
- `email`: Email address of the branch.
- `created_at`: Timestamp of when the branch was created.
- `updated_at`: Timestamp of when the branch was last updated.

## Request Validation Rules

- **Create Rules**:
  - `store_id`: Required field, must exist in the stores table.
  - `city_id`: Required field, must exist in the cities table.
  - `lat`: Required field, numeric.
  - `lang`: Required field, numeric.
  - `name`: Required field, string.
  - `phone`: Required field, string.
  - `email`: Required field, must be a valid email address.

- **Update Rules**:
  - `city_id`: Optional field, must exist in the cities table.
  - `lat`: Optional field, numeric.
  - `lang`: Optional field, numeric.
  - `name`: Optional field, array.
  - `phone`: Optional field, string.
  - `email`: Optional field, must be a valid email address and must be unique among branches.