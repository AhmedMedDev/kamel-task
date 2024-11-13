## Payment Gateway Module Documentation

The Payment Gateway Module facilitates the management of payment gateways available within your application.

### Endpoints

#### 1. Get Payment Gateways

- **Endpoint:** `GET /payment-gateways`
- **Description:** Retrieves all payment gateways.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "name": "Gateway Name",
              "description": "Gateway Description",
              "status": true,
              "client_namespace": "Client Namespace",
              "testing_credentials": { ... }
          },
          ...
      ]
  }
  ```

### Model: PaymentGateway

#### Attributes

- `id`: The unique identifier for the payment gateway.
- `name`: The name of the payment gateway.
- `description`: A brief description of the payment gateway.
- `status`: Indicates whether the payment gateway is active or inactive (`true` or `false`).
- `client_namespace`: The namespace of the client using this payment gateway.
- `testing_credentials`: Array containing testing credentials for the payment gateway.

#### Methods

- `scopeActive()`: Scope to filter active payment gateways.
- `scopeInactive()`: Scope to filter inactive payment gateways.

#### Request Validation Rules

- **Creation and Update:**
  - `name`: Required string with maximum length of 255 characters.
  - `description`: Nullable string.
  - `status`: Required boolean.