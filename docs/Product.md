## Products Module Documentation

The Products Module enables you to manage products in your application. It includes endpoints for creating, updating, and deleting products, as well as associating products with addons.

### Endpoints

#### 1. Get All Products

- **Endpoint:** `GET /products`
- **Description:** Retrieves a list of all products.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "store_id": 1,
              "brand_id": 1,
              "name": "Product Name",
              "slug": "product-name",
              "des": "Product Description",
              "visibility": ["web", "mobile"],
              "barcode": "123456789",
              "sku": "SKU123",
              "seo": {"title": "Product Title", "description": "Product Description", "keywords": "keyword1, keyword2"},
              "priority": 1,
              "dimensions": {"width": 10, "height": 20, "depth": 5},
              "published_at": "2024-04-18",
              "awarded_points": 100,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 2. Create Product

- **Endpoint:** `POST /products`
- **Description:** Creates a new product.
- **Request Parameters:**
  - `store_id` (integer, required): ID of the store the product belongs to.
  - `brand_id` (integer, required): ID of the brand associated with the product.
  - `name` (string, required): Name of the product.
  - `des` (string, required): Description of the product.
  - `visibility` (array, required): Array of strings indicating the visibility of the product (e.g., ["web", "mobile"]).
  - `barcode` (string, required): Barcode of the product.
  - `sku` (string, required): SKU (Stock Keeping Unit) of the product.
  - `seo` (array, required): SEO metadata for the product.
  - `priority` (numeric, required): Priority of the product.
  - `dimensions` (array, required): Dimensions of the product.
  - `published_at` (date, required): Date when the product was published.
  - `awarded_points` (numeric, required): Points awarded for purchasing the product.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Product

- **Endpoint:** `PUT /products/{product_id}`
- **Description:** Updates an existing product.
- **Request Parameters:** Same as the parameters for creating a product.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Product

- **Endpoint:** `DELETE /products/{product_id}`
- **Description:** Deletes an existing product.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

#### 5. Attach Addon to Product

- **Endpoint:** `POST /products/{product_id}/addons`
- **Description:** Associates addons with a product.
- **Request Parameters:**
  - `addons` (array, required): Array of addon IDs to attach to the product.
- **Response:**
  - Body:
    ```json
    {
        "message": "Attached successfully"
    }
    ```

#### 6. Detach Addon from Product

- **Endpoint:** `DELETE /products/{product_id}/addons`
- **Description:** Disassociates addons from a product.
- **Request Parameters:**
  - `addons` (array, required): Array of addon IDs to detach from the product.
- **Response:**
  - Body:
    ```json
    {
        "message": "Detached successfully"
    }
    ```

### Model

The Product model contains the following attributes:
- `id`: The ID of the product.
- `store_id`: ID of the store the product belongs to.
- `brand_id`: ID of the brand associated with the product.
- `name`: Name of the product.
- `slug`: Slug of the product.
- `des`: Description of the product.
- `visibility`: Array indicating the visibility of the product.
- `barcode`: Barcode of the product.
- `sku`: SKU (Stock Keeping Unit) of the product.
- `seo`: SEO metadata for the product.
- `priority`: Priority of the product.
- `dimensions`: Dimensions of the product.
- `published_at`: Date when the product was published.
- `awarded_points`: Points awarded for purchasing the product.

### Request Validation Rules

- **Create Rules:**
  - See the request parameters above.
  
- **Update Rules:**
  - See the request parameters above.
