# Brands Module

The Brands Module allows you to manage brands, including creating, updating, and deleting brands.

## Endpoints

### Get All Brands

#### Endpoint: `GET /brands`

Retrieves a list of all brands.

**Response:**
- Body:
  ```json
  {
      "payload": [
          {
              "id": 1,
              "title": {"en": "Brand Name"},
              "des": {"en": "Brand Description"},
              "slug": "brand-name",
              "website": "https://example.com",
              "visibility": ["web", "mobile"],
              "seo": {"title": "SEO Title", "description": "SEO Description", "keywords": "SEO Keywords"},
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

### Create Brand

#### Endpoint: `POST /brands`

Creates a new brand.

**Request Parameters:**
- `title` (array, required): The title of the brand. (Multilingual support)
- `des` (array, required): Description of the brand. (Multilingual support)
- `slug` (string, required): Slug for the brand.
- `website` (string, optional): Website URL for the brand.
- `visibility` (array, optional): Visibility settings for the brand.
- `seo` (array, optional): SEO attributes for the brand.

**Response:**
- Status Code: 201 Created
- Body:
  ```json
  {
      "message": "Created successfully",
      "payload": {}
  }
  ```

### Update Brand

#### Endpoint: `PUT /brands/{brand_id}`

Updates an existing brand.

**Request Parameters:**
- `title` (array, optional): The title of the brand. (Multilingual support)
- `des` (array, optional): Description of the brand. (Multilingual support)
- `slug` (string, optional): Slug for the brand.
- `website` (string, optional): Website URL for the brand.
- `visibility` (array, optional): Visibility settings for the brand.
- `seo` (array, optional): SEO attributes for the brand.

**Response:**
- Body:
  ```json
  {
      "message": "Updated successfully"
  }
  ```

### Delete Brand

#### Endpoint: `DELETE /brands/{brand_id}`

Deletes an existing brand.

**Response:**
- Body:
  ```json
  {
      "message": "Deleted successfully"
  }
  ```

## Model

The Brand model contains the following attributes:
- `id`: The ID of the brand.
- `title`: The title of the brand. (Multilingual support)
- `des`: Description of the brand. (Multilingual support)
- `slug`: The slugified version of the brand title.
- `website`: Website URL for the brand.
- `visibility`: Visibility settings for the brand.
- `seo`: SEO attributes for the brand.
- `created_at`: Timestamp of when the brand was created.
- `updated_at`: Timestamp of when the brand was last updated.

## Request Validation Rules

- **Create Rules**:
  - `title`: Required field with multilingual support.
  - `des`: Required field with multilingual support.
  - `slug`: Required field, must be a string.
  - `website`: Optional field, must be a valid URL.
  - `visibility`: Optional field, must be an array.
  - `seo`: Optional field, must be an array.

- **Update Rules**:
  - `title`: Optional field with multilingual support.
  - `des`: Optional field with multilingual support.
  - `slug`: Optional field, must be a string.
  - `website`: Optional field, must be a valid URL.
  - `visibility`: Optional field, must be an array.
  - `seo`: Optional field, must be an array.
