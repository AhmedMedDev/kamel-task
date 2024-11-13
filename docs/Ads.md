# Ads Module

The Ads Module allows you to manage advertisements, including creating, updating, and deleting ads.

## Endpoints

### Get All Ads

#### Endpoint: `GET /ads`

Retrieves a list of all ads.

**Response:**
- Body:
  ```json
  {
      "payload": [
          {
              "id": 1,
              "store_id": 1,
              "title": {"en": "Ad Title"},
              "des": {"en": "Ad Description"},
              "url": "https://example.com",
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

### Create Ad

#### Endpoint: `POST /ads`

Creates a new ad.

**Request Parameters:**
- `store_id` (integer, required): ID of the store associated with the ad.
- `title` (array, required): The title of the ad. (Multilingual support)
- `des` (array, required): Description of the ad. (Multilingual support)
- `url` (string, required): URL for the ad.

**Response:**
- Status Code: 201 Created
- Body:
  ```json
  {
      "message": "Created successfully",
      "payload": {}
  }
  ```

### Update Ad

#### Endpoint: `PUT /ads/{ad_id}`

Updates an existing ad.

**Request Parameters:**
- `title` (array, optional): The title of the ad. (Multilingual support)
- `des` (array, optional): Description of the ad. (Multilingual support)
- `url` (string, optional): URL for the ad.

**Response:**
- Body:
  ```json
  {
      "message": "Updated successfully"
  }
  ```

### Delete Ad

#### Endpoint: `DELETE /ads/{ad_id}`

Deletes an existing ad.

**Response:**
- Body:
  ```json
  {
      "message": "Deleted successfully"
  }
  ```

## Model

The Ad model contains the following attributes:
- `id`: The ID of the ad.
- `store_id`: The ID of the store associated with the ad.
- `title`: The title of the ad. (Multilingual support)
- `des`: Description of the ad. (Multilingual support)
- `url`: URL for the ad.
- `created_at`: Timestamp of when the ad was created.
- `updated_at`: Timestamp of when the ad was last updated.

## Request Validation Rules

- **Create Rules**:
  - `title`: Required field with multilingual support.
  - `des`: Required field with multilingual support.
  - `url`: Required field, must be a valid URL.

- **Update Rules**:
  - `title`: Optional field with multilingual support.
  - `des`: Optional field with multilingual support.
  - `url`: Optional field, must be a valid URL.