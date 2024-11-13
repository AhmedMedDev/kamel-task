## Setting Module Documentation

The Setting Module manages the creation, retrieval, updating, and deletion of settings within your application.

### Endpoints

#### 1. Get All Settings

- **Endpoint:** `GET /settings`
- **Description:** Retrieves a list of all settings.
- **Response:**
  ```json
  {
      "payload": [
          {
            "id": 1,
            "store_id": 1,
            "theme_id": 1,
            "store_types": [...],
            "payload": {...},
            "title": {...},
            "meta_description": {...},
            "keywords": {...},
            "author": {...},
            "copyright": "Copyright",
            "slogan": "Slogan",
            "og_title": "OG Title",
            "og_description": "OG Description",
            "og_image": "OG Image URL",
            "og_url": "OG URL",
            "og_type": "OG Type",
            "colors": {...},
            "busy": true,
            "active_points": true,
            "points": 123,
            "kwd_points": 1,
            "langs": [...],
            "product_theme_id": 1,
            "banner_theme_id": 1,
            "category_theme_id": 1,
            "store_front_sections": [
                {
                    "section": "banners",
                    "visible": 1
                },
                {
                    "section": "categories",
                    "visible": 1
                },
                {
                    "section": "products",
                    "visible": 1
                }
            ],
            "banners_font_style": {
                "font_name": "Some font name",
                "font_weight": "Some font weight",
                "font_size": "Some font size"
            },
            "categories_font_style": {
                "font_name": "Some font name",
                "font_weight": "Some font weight",
                "font_size": "Some font size"
            },
            "products_font_style": {
                "font_name": "Some font name",
                "font_weight": "Some font weight",
                "font_size": "Some font size"
            },
            "created_at": "2024-04-18T12:00:00Z",
            "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 2. Create Setting

- **Endpoint:** `POST /settings`
- **Description:** Creates a new setting.
- **Request Parameters:**
  - Various parameters representing different settings. Refer to the model definition for details.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Setting

- **Endpoint:** `PUT /settings/{setting_id}`
- **Description:** Updates an existing setting.
- **Request Parameters:**
  - Various parameters representing different settings. Refer to the model definition for details.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Setting

- **Endpoint:** `DELETE /settings/{setting_id}`
- **Description:** Deletes an existing setting.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### Models

- **Setting Model:**
  - Attributes:
    - `id`: The ID of the setting.
    - `store_id`: The ID of the store associated with the setting.
    - `theme_id`: The ID of the theme associated with the setting.
    - Various other attributes representing different settings. Refer to the model definition for details.
  - Methods:
    - `getStoreTypesAttribute($value)`: Accessor method to decode JSON stored in the `store_types` attribute.
    - `setStoreTypesAttribute($value)`: Mutator method to encode array into JSON before storing in the `store_types` attribute.

### Observers

- **Media Observer:**
  - Observes changes related to media.
  - Methods:
    - `created($model)`: Adds media when a new model instance is created.
    - `updating($model)`: Adds or updates media when a model instance is being updated.
    - `deleting($model)`: Deletes media associated with a model instance when it is deleted.

### Request Validation Rules

- **Create Rules:**
  - Various validation rules for different attributes. Refer to the model definition for details.
- **Update Rules:**
  - Various validation rules for different attributes. Refer to the model definition for details.
