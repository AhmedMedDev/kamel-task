# Store Module

The Store Module allows you to manage stores, including creating, updating, and deleting stores, as well as attaching and detaching payment gateways to stores.

## Endpoints

### Get All Stores

#### Endpoint: `GET /stores`

Retrieves a list of all stores.

**Response:**
- Body:
  ```json
  {
      "payload": [
          {
              "id": 1,
              "subdomain": "example",
              "custom_domain": null,
              "name": {"en": "Example Store"},
              "description": {"en": "This is an example store."},
              "phone": null,
              "email": null,
              "revenue": null,
              "media": [],
              "business_user_id": 123,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

### Create Store

#### Endpoint: `POST /stores`

Creates a new store.

**Request Parameters:**
- `subdomain` (string, required): The subdomain of the store.
- `custom_domain` (string, optional): Custom domain for the store.
- `name` (array, required): The name of the store. (Multilingual support)
- `description` (array, optional): Description of the store. (Multilingual support)
- `phone` (string, optional): Phone number of the store.
- `email` (string, optional): Email address of the store.
- `revenue` (numeric, optional): Revenue of the store.
- `media` (array, optional): Media associated with the store.
- `business_user_id` (integer, required): ID of the business user associated with the store.

**Response:**
- Status Code: 201 Created
- Body:
  ```json
  {
      "message": "Created successfully",
      "payload": {}
  }
  ```

### Update Store

#### Endpoint: `PUT /stores/{store_id}`

Updates an existing store.

**Request Parameters:**
- `subdomain` (string, optional): The subdomain of the store.
- `custom_domain` (string, optional): Custom domain for the store.
- `name` (array, optional): The name of the store. (Multilingual support)
- `description` (array, optional): Description of the store. (Multilingual support)
- `phone` (string, optional): Phone number of the store.
- `email` (string, optional): Email address of the store.
- `revenue` (numeric, optional): Revenue of the store.
- `media` (array, optional): Media associated with the store.

**Response:**
- Body:
  ```json
  {
      "message": "Updated successfully"
  }
  ```

### Delete Store

#### Endpoint: `DELETE /stores/{store_id}`

Deletes an existing store.

**Response:**
- Body:
  ```json
  {
      "message": "Deleted successfully"
  }
  ```

### Attach Payment Gateway

#### Endpoint: `POST /stores/{store_id}/payment-gateways`

Attaches a payment gateway to a store.

**Request Parameters:**
- `payment_gateway_id` (integer, required): ID of the payment gateway.
- `credentials` (array, required): Credentials required for the payment gateway.
- `is_active` (boolean, required): Indicates whether the payment gateway is active.

**Response:**
- Body:
  ```json
  {
      "message": "Attached successfully"
  }
  ```

### Detach Payment Gateway

#### Endpoint: `DELETE /stores/{store_id}/payment-gateways`

Detaches a payment gateway from a store.

**Request Parameters:**
- `payment_gateway_id` (integer, required): ID of the payment gateway.

**Response:**
- Body:
  ```json
  {
      "message": "Detached successfully"
  }
  ```

## Response Payload

The response payload for store objects contains the following attributes:
- `id`: The ID of the store.
- `subdomain`: The subdomain of the store.
- `custom_domain`: Custom domain for the store.
- `name`: The name of the store. (Multilingual support)
- `description`: Description of the store. (Multilingual support)
- `phone`: Phone number of the store.
- `email`: Email address of the store.
- `revenue`: Revenue of the store.
- `media`: Media associated with the store.
- `business_user_id`: ID of the business user associated with the store.
- `created_at`: Timestamp of when the store was created.
- `updated_at`: Timestamp of when the store was last updated.
