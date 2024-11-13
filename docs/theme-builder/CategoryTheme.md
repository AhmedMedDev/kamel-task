## Category Theme Module Documentation

The Category Theme Module manages the creation, retrieval, updating, and deletion of category themes within your application.

### Endpoints

#### 1. Get All Category Themes

- **Endpoint:** `GET /category-themes`
- **Description:** Retrieves a list of all category themes.
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

#### 2. Create Category Theme

- **Endpoint:** `POST /category-themes`
- **Description:** Creates a new category theme.
- **Request Parameters:**
  - `name` (string, required): Name of the category theme.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Category Theme

- **Endpoint:** `PUT /category-themes/{category_theme_id}`
- **Description:** Updates an existing category theme.
- **Request Parameters:**
  - `name` (string): New name for the category theme.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Category Theme

- **Endpoint:** `DELETE /category-themes/{category_theme_id}`
- **Description:** Deletes an existing category theme.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### Models

- **Category Theme Model:**
  - Attributes:
    - `id`: The ID of the category theme.
    - `name`: Name of the category theme.
    - `slug`: Slug generated from the name of the category theme.
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
  - `name` (required, string): Name of the category theme.
- **Update Rules:**
  - `name` (string): New name of the category theme.
