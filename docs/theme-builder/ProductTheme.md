## Product Theme Module Documentation

The Product Theme Module manages the creation, retrieval, updating, and deletion of product themes within your application.

### Endpoints

#### 1. Get All Product Themes

- **Endpoint:** `GET /product-themes`
- **Description:** Retrieves a list of all product themes.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "name": "Theme Name",
              "slug": "theme-name",
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 2. Create Product Theme

- **Endpoint:** `POST /product-themes`
- **Description:** Creates a new product theme.
- **Request Parameters:**
  - `name` (string, required): Name of the product theme.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Product Theme

- **Endpoint:** `PUT /product-themes/{product_theme_id}`
- **Description:** Updates an existing product theme.
- **Request Parameters:**
  - `name` (string): New name for the product theme.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Product Theme

- **Endpoint:** `DELETE /product-themes/{product_theme_id}`
- **Description:** Deletes an existing product theme.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### Models

- **Product Theme Model:**
  - Attributes:
    - `id`: The ID of the product theme.
    - `name`: Name of the product theme.
    - `slug`: Slug generated from the name of the product theme.
  - Methods:
    - `setNameAttribute($value)`: Sets the name attribute and generates the slug automatically.

### Observers

- **Media Observer:**
  - Observes changes related to media.
  - Methods:
    - `created($model)`: Adds media when a new model instance is created.
    - `updating($model)`: Adds or updates media when a model instance is being updated.
    - `deleting($model)`: Deletes media associated with a model instance when it is deleted.

### Request Validation Rules

- **Create Rules:**
  - `name` (required, string): Name of the product theme.
- **Update Rules:**
  - `name` (string): New name of the product theme.
