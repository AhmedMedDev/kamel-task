# Addons Module

The Addons Module allows you to manage addons associated with stores. This includes creating, updating, and deleting addons.

## Endpoints

### Get All Addons

#### Endpoint: `GET /addons`

Retrieves a list of all addons.

**Response:**
- Body:
  ```json
  {
      "payload": [
          {
              "id": 1,
              "store_id": 1,
              "name": "Addon Name",
              "price": 10.99,
              "visibility": ["web", "mobile"],
              "parent_id": null,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

### Create Addon

#### Endpoint: `POST /addons`

Creates a new addon.

**Request Parameters:**
- `store_id` (integer, required): ID of the store the addon belongs to.
- `name` (string, required): Name of the addon.
- `price` (numeric, required): Price of the addon.
- `visibility` (array, required): Array of strings indicating the visibility of the addon (e.g., ["web", "mobile"]).
- `parent_id` (integer, optional): ID of the parent addon if this addon is a child addon.

**Response:**
- Status Code: 201 Created
- Body:
  ```json
  {
      "message": "Created successfully",
      "payload": {}
  }
  ```

### Update Addon

#### Endpoint: `PUT /addons/{addon_id}`

Updates an existing addon.

**Request Parameters:**
- `store_id` (integer, optional): ID of the store the addon belongs to.
- `name` (array, optional): Name of the addon.
- `price` (numeric, optional): Price of the addon.
- `visibility` (array, optional): Array of strings indicating the visibility of the addon (e.g., ["web", "mobile"]).
- `parent_id` (integer, optional): ID of the parent addon if this addon is a child addon.

**Response:**
- Body:
  ```json
  {
      "message": "Updated successfully"
  }
  ```

### Delete Addon

#### Endpoint: `DELETE /addons/{addon_id}`

Deletes an existing addon.

**Response:**
- Body:
  ```json
  {
      "message": "Deleted successfully"
  }
  ```

## Model

The Addon model contains the following attributes:
- `id`: The ID of the addon.
- `store_id`: ID of the store the addon belongs to.
- `name`: Name of the addon.
- `price`: Price of the addon.
- `visibility`: Array indicating the visibility of the addon.
- `parent_id`: ID of the parent addon if this addon is a child addon.
- `created_at`: Timestamp of when the addon was created.
- `updated_at`: Timestamp of when the addon was last updated.

## Request Validation Rules

- **Create Rules**:
  - `store_id`: Required field, must exist in the stores table.
  - `name`: Required field, string.
  - `price`: Required field, numeric.
  - `visibility`: Required field, array.
  - `parent_id`: Optional field, must exist in the addons table if provided.

- **Update Rules**:
  - `store_id`: Optional field, must exist in the stores table.
  - `name`: Optional field, array.
  - `price`: Optional field, numeric.
  - `visibility`: Optional field, array.
  - `parent_id`: Optional field, must exist in the addons table if provided.