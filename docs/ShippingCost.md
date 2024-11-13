## Shipping Costs Module Documentation

The Shipping Costs Module manages the shipping costs associated with different locations and branches in your application.

### Endpoints

#### 1. Get All Shipping Costs

- **Endpoint:** `GET /shipping-costs`
- **Description:** Retrieves a list of all shipping costs.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "branch_id": 1,
              "shippable_type": "App\\Models\\City",
              "shippable_id": 1,
              "cost": 10.0,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 2. Create Shipping Cost

- **Endpoint:** `POST /shipping-costs`
- **Description:** Creates a new shipping cost entry.
- **Request Parameters:**
  - `branch_id` (integer, required): ID of the branch associated with the shipping cost.
  - `shippable_type` (string, required): Type of the shippable location (e.g., "App\Models\City", "App\Models\Country", "App\Models\Governorate").
  - `shippable_id` (integer, required): ID of the shippable location.
  - `cost` (numeric, required): Cost of shipping to the specified location.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Shipping Cost

- **Endpoint:** `PUT /shipping-costs/{shipping_cost_id}`
- **Description:** Updates an existing shipping cost entry.
- **Request Parameters:** Same as the parameters for creating a shipping cost entry.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Shipping Cost

- **Endpoint:** `DELETE /shipping-costs/{shipping_cost_id}`
- **Description:** Deletes an existing shipping cost entry.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### Models

- **ShippingCost Model:**
  - Attributes:
    - `id`: The ID of the shipping cost entry.
    - `branch_id`: ID of the branch associated with the shipping cost.
    - `shippable_type`: Type of the shippable location.
    - `shippable_id`: ID of the shippable location.
    - `cost`: Cost of shipping to the specified location.
  - [View Model](#)

### Request Validation Rules

- **Create Rules:**
  - `branch_id`: required, exists in `branches` table.
  - `shippable_type`: required, string.
  - `shippable_id`: required, integer.
  - `cost`: required, numeric, minimum value: 0.

- **Update Rules:**
  - `cost`: sometimes (optional), numeric, minimum value: 0.
