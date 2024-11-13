### Entity Incorporation Feature

The entity incorporation feature enables you to fetch related entities along with the main data in API responses. This capability simplifies data retrieval and reduces the number of API calls needed.

#### Usage

To include related entities, follow these steps:

1. **Retrieve Entity Names**: Obtain the names of related entities from the backend models. These names typically match the names of the relationships defined in the Laravel models. Please consider that, to include images add `media` word, not all models have images just model implements `HasMedia` i.e `class Addon extends BaseModel implements HasMedia`

2. **Construct the Request**: Send a GET request to the desired API endpoint with the `include` query parameter. The value of the `include` parameter should be an array containing the names of the related entities you want to include.

   Example:

   ```
   GET /api/order?include[]=items&include[]=customer
   ```

   In this example, `items` and `customer` are the names of related entities.

#### Validation

The `include` parameter is validated by the backend to ensure that it's properly formatted. If the `include` parameter is not an array or contains invalid entity names, you'll receive a 400 Bad Request response.

#### Global Scope

A global scope is applied to all Eloquent models on the backend, automatically including related entities based on the `include` parameter in the request. This simplifies frontend development by reducing the need to manually specify eager loading in each API call.