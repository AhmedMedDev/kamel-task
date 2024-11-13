## Variants Module Documentation

The Variants Module allows you to manage product variants in your application. It includes endpoints for creating, updating, and deleting variants associated with products.

### Endpoints

#### 1. Get All Variants

- **Endpoint:** `GET /variants`
- **Description:** Retrieves a list of all variants.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "product_id": 1,
              "cost": 10.99,
              "price": 19.99,
              "old_price": 15.99,
              "policies": {"backorder": false, "requires_shipping": true, "pickup": false, "dine_in": true},
              "visibility": ["web", "mobile"],
              "barcode": "123456789",
              "sku": "SKU123",
              "specifications": {"color": "Red", "size": "M", "weight": 0.5, "dimensions": {"width": 10, "height": 20, "depth": 5}},
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 2. Create Variant

- **Endpoint:** `POST /variants`
- **Description:** Creates a new variant.
- **Request Parameters:**
  - `product_id` (integer, required): ID of the product the variant belongs to.
  - `cost` (numeric, required): Cost of the variant.
  - `price` (numeric, required): Price of the variant.
  - `old_price` (numeric): Previous price of the variant.
  - `policies` (array, required): Policies of the variant (e.g., backorder, requires_shipping, pickup, dine_in).
  - `visibility` (array, required): Visibility of the variant.
  - `barcode` (string, required): Barcode of the variant.
  - `sku` (string, required): SKU (Stock Keeping Unit) of the variant.
  - `specifications` (array, required): Specifications of the variant (e.g., color, size, weight, dimensions).
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Variant

- **Endpoint:** `PUT /variants/{variant_id}`
- **Description:** Updates an existing variant.
- **Request Parameters:** Same as the parameters for creating a variant.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Variant

- **Endpoint:** `DELETE /variants/{variant_id}`
- **Description:** Deletes an existing variant.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### Model

The Variant model contains the following attributes:
- `id`: The ID of the variant.
- `product_id`: ID of the product the variant belongs to.
- `cost`: Cost of the variant.
- `price`: Price of the variant.
- `old_price`: Previous price of the variant.
- `policies`: Policies of the variant.
- `visibility`: Visibility of the variant.
- `barcode`: Barcode of the variant.
- `sku`: SKU (Stock Keeping Unit) of the variant.
- `specifications`: Specifications of the variant.

### Request Validation Rules

- **Create Rules:**
  - See the request parameters above.
  
- **Update Rules:**
  - See the request parameters above.
