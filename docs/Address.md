## Address Module Documentation

The Address Module facilitates the management of customer addresses within your application.

### Endpoints

#### 1. Addresses

- **Get Addresses**
  - **Endpoint:** `GET /addresses`
  - **Description:** Retrieves all addresses associated with the authenticated customer.
  
- **Create Address**
  - **Endpoint:** `POST /addresses`
  - **Description:** Creates a new address for the authenticated customer.
  
- **Update Address**
  - **Endpoint:** `PUT /addresses/{address_id}`
  - **Description:** Updates an existing address associated with the authenticated customer.
  
- **Delete Address**
  - **Endpoint:** `DELETE /addresses/{address_id}`
  - **Description:** Deletes an existing address associated with the authenticated customer.

### Models

#### 1. Address

- **Attributes:**
  - `id`: Unique identifier for the address.
  - `customer_id`: ID of the customer associated with the address.
  - `address`: Address string.
  - `city_id`: ID of the city associated with the address.
  - `lat`: Latitude of the address.
  - `lng`: Longitude of the address.
  
#### 2. City

- **Attributes:**
  - `id`: Unique identifier for the city.
  - `name`: Name of the city.

### Request Validation Rules

- **Address Creation:**
  - `address`: Required, string, max 255 characters.
  - `city_id`: Required, must exist in the `cities` table.
  
- **Address Update:**
  - `address`: String, max 255 characters.
  - `city_id`: Must exist in the `cities` table.

### Global Scopes

- **User Scope:** Filters addresses based on the authenticated user. Non-admin users can only retrieve their own addresses.

### Events

- **Creating Event:** Automatically sets the `customer_id` field to the ID of the authenticated customer.
  
### Factories

- **AddressFactory:** Generates fake data for addresses.
