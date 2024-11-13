## Order Module Documentation

The Order Module provides endpoints to manage orders within your application.

### Endpoints

#### 1. Get Orders

- **Endpoint:** `GET /orders`
- **Description:** Retrieves all orders.
- **Response:**
  ```json
  {
      "payload": [
          {
              "order_id": 1,
              "order_details": { ... },
              ...
          },
          ...
      ]
  }
  ```

#### 2. Place Order

- **Endpoint:** `POST /orders/place-order`
- **Description:** Places a new order.
- **Request Body:** Contains order details based on the order type.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Order placed successfully",
        "payload": { ... }
    }
    ```

#### 3. Create Order

- **Endpoint:** `POST /orders`
- **Description:** Creates a new order.
- **Request Body:** Contains order details.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Order created successfully",
        "payload": { ... }
    }
    ```

#### 4. Update Order

- **Endpoint:** `PUT /orders/{order_id}`
- **Description:** Updates an existing order.
- **Request Body:** Contains updated order details.
- **Response:**
  - Status Code: 200 OK
  - Body:
    ```json
    {
        "message": "Order updated successfully"
    }
    ```

#### 5. Delete Order

- **Endpoint:** `DELETE /orders/{order_id}`
- **Description:** Deletes an existing order.
- **Response:**
  - Status Code: 200 OK
  - Body:
    ```json
    {
        "message": "Order deleted successfully"
    }
    ```

### Request Validation Rules

- **Place Order:**
  - Various rules based on the order type (`delivery`, `pickup`, `dine_in`).
- **Create Order:**
  - Specific rules defined in the `Order` model.
- **Update Order:**
  - Specific rules defined in the `Order` model.
- **Delete Order:**
  - No specific validation rules.

### Middlewares

- **Authentication Middleware:** Ensures that the user is authenticated.