# Categories Module

The Categories Module allows you to manage categories, including creating, updating, and deleting categories, as well as attaching and detaching products to categories.

## Endpoints

### Get All Categories

#### Endpoint: `GET /categories`

Retrieves a list of all categories.

**Response:**
- Body:
  ```json
  {
      "payload": [
          {
              "id": 1,
              "parent_id": null,
              "name": {"en": "Category Name"},
              "slug": "category-name",
              "description": {"en": "Category Description"},
              "icon": "icon-url",
              "seo": {},
              "visibility": {},
              "store_id": 1,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

### Create Category

#### Endpoint: `POST /categories`

Creates a new category.

**Request Parameters:**
- `name` (array, required): The name of the category. (Multilingual support)
- `description` (array, required): Description of the category. (Multilingual support)
- `icon` (string, required): Icon URL for the category.
- `seo` (array, required): SEO attributes for the category.
- `visibility` (array, required): Visibility settings for the category.
- `store_id` (integer, required): ID of the store associated with the category.

**Response:**
- Status Code: 201 Created
- Body:
  ```json
  {
      "message": "Created successfully",
      "payload": {}
  }
  ```

### Update Category

#### Endpoint: `PUT /categories/{category_id}`

Updates an existing category.

**Request Parameters:**
- `name` (array, optional): The name of the category. (Multilingual support)
- `description` (array, optional): Description of the category. (Multilingual support)
- `icon` (string, optional): Icon URL for the category.
- `seo` (array, optional): SEO attributes for the category.
- `visibility` (array, optional): Visibility settings for the category.

**Response:**
- Body:
  ```json
  {
      "message": "Updated successfully"
  }
  ```

### Delete Category

#### Endpoint: `DELETE /categories/{category_id}`

Deletes an existing category.

**Response:**
- Body:
  ```json
  {
      "message": "Deleted successfully"
  }
  ```

### Attach Product to Category

#### Endpoint: `POST /categories/{category_id}/products`

Attaches one or more products to a category.

**Request Parameters:**
- `products` (array, required): IDs of the products to be attached to the category.

**Response:**
- Body:
  ```json
  {
      "message": "Attached successfully"
  }
  ```

### Detach Product from Category

#### Endpoint: `DELETE /categories/{category_id}/products`

Detaches one or more products from a category.

**Request Parameters:**
- `products` (array, required): IDs of the products to be detached from the category.

**Response:**
- Body:
  ```json
  {
      "message": "Detached successfully"
  }
  ```

## Response Payload

The response payload for category objects contains the following attributes:
- `id`: The ID of the category.
- `parent_id`: The ID of the parent category (if applicable).
- `name`: The name of the category. (Multilingual support)
- `slug`: The slugified version of the category name.
- `description`: Description of the category. (Multilingual support)
- `icon`: Icon URL for the category.
- `seo`: SEO attributes for the category.
- `visibility`: Visibility settings for the category.
- `store_id`: ID of the store associated with the category.
- `created_at`: Timestamp of when the category was created.
- `updated_at`: Timestamp of when the category was last updated.