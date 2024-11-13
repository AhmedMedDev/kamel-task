## Banner Theme Module Documentation

The Banner Theme Module manages the creation, retrieval, updating, and deletion of banner themes within your application.

### Endpoints

#### 1. Get All Banner Themes

- **Endpoint:** `GET /banner-themes`
- **Description:** Retrieves a list of all banner themes.
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

#### 2. Create Banner Theme

- **Endpoint:** `POST /banner-themes`
- **Description:** Creates a new banner theme.
- **Request Parameters:**
  - `name` (string, required): Name of the banner theme.
  - `image` (file, optional): Image file for the banner theme.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Banner Theme

- **Endpoint:** `PUT /banner-themes/{banner_theme_id}`
- **Description:** Updates an existing banner theme.
- **Request Parameters:**
  - `name` (string): New name for the banner theme.
  - `image` (file, optional): New image file for the banner theme.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Banner Theme

- **Endpoint:** `DELETE /banner-themes/{banner_theme_id}`
- **Description:** Deletes an existing banner theme.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### Models

- **Banner Theme Model:**
  - Attributes:
    - `id`: The ID of the banner theme.
    - `name`: Name of the banner theme.
    - `slug`: Slug generated from the name of the banner theme.
  - Methods:
    - `setNameAttribute($value)`: Sets the name attribute and generates the slug automatically.

### Observers

- **Media Observer:**
  - Observes changes related to media (images).
  - Methods:
    - `created($model)`: Adds media (image) when a new model instance is created.
    - `updating($model)`: Adds or updates media (image) when a model instance is being updated.
    - `deleting($model)`: Deletes media (image) associated with a model instance when it is deleted.

### Request Validation Rules

- **Create Rules:**
  - `name` (required, string): Name of the banner theme (maximum length: 255).
  - `image` (file, optional): Image file for the banner theme.
- **Update Rules:**
  - `name` (string): New name of the banner theme (maximum length: 255).
  - `image` (file, optional): New image file for the banner theme.
