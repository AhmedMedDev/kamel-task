## Cart Module Documentation

The Cart Module provides functionality for managing user shopping carts and cart addons in your application.

### Cart Endpoints

#### 1. Get All Carts

- **Endpoint:** `GET /carts`
- **Description:** Retrieves a list of all carts.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "customer_id": 1,
              "variant_id": 1,
              "quantity": 2,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 2. Create Cart

- **Endpoint:** `POST /carts`
- **Description:** Creates a new cart.
- **Request Parameters:**
  - `customer_id` (integer): ID of the customer who owns the cart.
  - `variant_id` (integer, required): ID of the variant to add to the cart.
  - `quantity` (integer, required): Quantity of the variant to add to the cart.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Cart

- **Endpoint:** `PUT /carts/{cart_id}`
- **Description:** Updates an existing cart.
- **Request Parameters:** Same as the parameters for creating a cart.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Cart

- **Endpoint:** `DELETE /carts/{cart_id}`
- **Description:** Deletes an existing cart.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### CartAddon Endpoints

#### 1. Get All Cart Addons

- **Endpoint:** `GET /cart-addons`
- **Description:** Retrieves a list of all cart addons.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "customer_id": 1,
              "addon_id": 1,
              "quantity": 2,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 2. Create Cart Addon

- **Endpoint:** `POST /cart-addons`
- **Description:** Creates a new cart addon.
- **Request Parameters:**
  - `customer_id` (integer): ID of the customer who owns the cart addon.
  - `addon_id` (integer, required): ID of the addon to add to the cart.
  - `quantity` (integer, required): Quantity of the addon to add to the cart.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Cart Addon

- **Endpoint:** `PUT /cart-addons/{cart_addon_id}`
- **Description:** Updates an existing cart addon.
- **Request Parameters:** Same as the parameters for creating a cart addon.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Cart Addon

- **Endpoint:** `DELETE /cart-addons/{cart_addon_id}`
- **Description:** Deletes an existing cart addon.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### Models

- **Cart Model:**
  - Attributes:
    - `id`: The ID of the cart.
    - `customer_id`: ID of the customer who owns the cart.
    - `variant_id`: ID of the variant in the cart.
    - `quantity`: Quantity of the variant in the cart.

- **CartAddon Model:**
  - Attributes:
    - `id`: The ID of the cart addon.
    - `customer_id`: ID of the customer who owns the cart addon.
    - `addon_id`: ID of the addon in the cart.
    - `quantity`: Quantity of the addon in the cart.

### Request Validation Rules

- **Create Rules:**
  - See the request parameters above for both Cart and CartAddon.

- **Update Rules:**
  - See the request parameters above for both Cart and CartAddon.
