## Invoice Module Documentation

The Invoice Module manages the creation, retrieval, updating, and deletion of invoices and their settings within your application.

### Endpoints

#### 1. Get All Invoices

- **Endpoint:** `GET /invoices`
- **Description:** Retrieves a list of all invoices.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "invoice_number": 12345678,
              "user_id": 1,
              "store_id": 1,
              "total_amount": 100.0,
              "billing_address": "123 Main St, City, Country",
              "payment_method": "credit_card",
              "shipping_address": "456 Oak Ave, Town, Country",
              "currency": "USD",
              "note": "Some notes about the invoice",
              "is_paid": true,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 2. Create Invoice

- **Endpoint:** `POST /invoices`
- **Description:** Creates a new invoice.
- **Request Parameters:**
  - `invoice_number` (numeric, required): Unique invoice number.
  - `user_id` (integer, required): ID of the user associated with the invoice.
  - `store_id` (integer, required): ID of the store associated with the invoice.
  - `total_amount` (numeric, required): Total amount of the invoice.
  - `billing_address` (string, required): Billing address for the invoice.
  - `payment_method` (string, required): Payment method used for the invoice.
  - `shipping_address` (string, required): Shipping address for the invoice.
  - `currency` (string, required): Currency used for the invoice.
  - `note` (string, required): Additional notes for the invoice.
  - `is_paid` (boolean, required): Indicates if the invoice is paid.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 3. Update Invoice

- **Endpoint:** `PUT /invoices/{invoice_id}`
- **Description:** Updates an existing invoice.
- **Request Parameters:** Same as the parameters for creating an invoice.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 4. Delete Invoice

- **Endpoint:** `DELETE /invoices/{invoice_id}`
- **Description:** Deletes an existing invoice.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

#### 5. Get All Invoice Settings

- **Endpoint:** `GET /invoice-settings`
- **Description:** Retrieves a list of all invoice settings.
- **Response:**
  ```json
  {
      "payload": [
          {
              "id": 1,
              "header_label": "Invoice Header",
              "invoice_start_number": 12345678,
              "enable_tax": true,
              "tax": 10,
              "note": "Some notes about invoice settings",
              "contact_phone": "+1234567890",
              "store_id": 1,
              "created_at": "2024-04-18T12:00:00Z",
              "updated_at": "2024-04-18T12:00:00Z"
          },
          ...
      ]
  }
  ```

#### 6. Create Invoice Setting

- **Endpoint:** `POST /invoice-settings`
- **Description:** Creates a new invoice setting.
- **Request Parameters:**
  - `header_label` (string): Label for the invoice header.
  - `invoice_start_number` (numeric): Starting number for invoice numbering.
  - `enable_tax` (boolean): Indicates if tax is enabled for invoices.
  - `tax` (integer): Tax rate for invoices.
  - `note` (string): Additional notes for invoice settings.
  - `contact_phone` (string): Contact phone number for invoice settings.
  - `store_id` (integer, required): ID of the store associated with the invoice settings.
- **Response:**
  - Status Code: 201 Created
  - Body:
    ```json
    {
        "message": "Created successfully",
        "payload": {}
    }
    ```

#### 7. Update Invoice Setting

- **Endpoint:** `PUT /invoice-settings/{invoice_setting_id}`
- **Description:** Updates an existing invoice setting.
- **Request Parameters:** Same as the parameters for creating an invoice setting.
- **Response:**
  - Body:
    ```json
    {
        "message": "Updated successfully"
    }
    ```

#### 8. Delete Invoice Setting

- **Endpoint:** `DELETE /invoice-settings/{invoice_setting_id}`
- **Description:** Deletes an existing invoice setting.
- **Response:**
  - Body:
    ```json
    {
        "message": "Deleted successfully"
    }
    ```

### Models

- **Invoice Model:**
  - Attributes:
    - `id`: The ID of the invoice.
    - `invoice_number`: Unique invoice number.
    - `user_id`: ID of the user associated with the invoice.
    - `store_id`: ID of the store associated with the invoice.
    - `total_amount`: Total amount of the invoice.
    - `billing_address`: Billing address for the invoice.
    - `payment_method`: Payment method used for the invoice.
    - `shipping_address`: Shipping address for the invoice.
    - `currency`: Currency used for the invoice.
    - `note`: Additional notes for the invoice.
    - `is_paid`: Indicates if the invoice is paid.
- **Invoice Setting Model:**
  - Attributes:
    - `id`: The ID of the invoice setting.
    - `header_label`: Label for the invoice header.
    - `invoice_start_number`: Starting number for invoice numbering.
    - `enable_tax`: Indicates if tax is enabled for invoices.
    - `tax`: Tax rate for invoices.
    - `note`: Additional notes for invoice settings.
    - `contact_phone`: Contact phone number for invoice settings.
    - `store_id`: ID of the store associated with the invoice settings.

### Request Validation Rules

- **Invoice Create Rules:**
  - Detailed rules for each parameter are defined in the code.
- **Invoice Update Rules:**
  - Detailed rules for each parameter are defined in the code.
- **Invoice Setting Create Rules:**
  - Detailed rules for each parameter are defined in the code.
- **Invoice Setting Update Rules:**
  - Detailed rules for each parameter are defined in the code.
