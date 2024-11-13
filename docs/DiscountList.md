## Discount Module Documentation

The Discount Module allows you to manage discount lists, assign discounts to products, and associate discounts with users.

### Endpoints

#### 1. Discount Lists

- **Get Discount Lists**
  - **Endpoint:** `GET /discount-lists`
  - **Description:** Retrieves all discount lists.
  
- **Create Discount List**
  - **Endpoint:** `POST /discount-lists`
  - **Description:** Creates a new discount list.
  
- **Update Discount List**
  - **Endpoint:** `PUT /discount-lists/{discount_list_id}`
  - **Description:** Updates an existing discount list.
  
- **Delete Discount List**
  - **Endpoint:** `DELETE /discount-lists/{discount_list_id}`
  - **Description:** Deletes an existing discount list.

#### 2. Discount List Products

- **Get Discount List Products**
  - **Endpoint:** `GET /discount-list-products`
  - **Description:** Retrieves all discount list products.
  
- **Create Discount List Product**
  - **Endpoint:** `POST /discount-list-products`
  - **Description:** Creates a new discount list product.
  
- **Update Discount List Product**
  - **Endpoint:** `PUT /discount-list-products/{discount_list_product_id}`
  - **Description:** Updates an existing discount list product.
  
- **Delete Discount List Product**
  - **Endpoint:** `DELETE /discount-list-products/{discount_list_product_id}`
  - **Description:** Deletes an existing discount list product.

#### 3. Discount List Users

- **Get Discount List Users**
  - **Endpoint:** `GET /discount-list-users`
  - **Description:** Retrieves all discount list users.
  
- **Create Discount List User**
  - **Endpoint:** `POST /discount-list-users`
  - **Description:** Creates a new discount list user.
  
- **Update Discount List User**
  - **Endpoint:** `PUT /discount-list-users/{discount_list_user_id}`
  - **Description:** Updates an existing discount list user.
  
- **Delete Discount List User**
  - **Endpoint:** `DELETE /discount-list-users/{discount_list_user_id}`
  - **Description:** Deletes an existing discount list user.

### Models

#### 1. DiscountList

- **Attributes:**
  - `id`: Unique identifier for the discount list.
  - `title`: Title of the discount list.
  - `store_id`: ID of the store associated with the discount list.
  
#### 2. DiscountListProduct

- **Attributes:**
  - `id`: Unique identifier for the discount list product.
  - `discount_list_id`: ID of the discount list.
  - `product_id`: ID of the product associated with the discount list.
  - `quantity`: Quantity of the product.
  - `discount_amount`: Discount amount for the product.
  - `store_id`: ID of the store associated with the discount list product.

#### 3. DiscountListUser

- **Attributes:**
  - `id`: Unique identifier for the discount list user.
  - `discount_list_id`: ID of the discount list.
  - `user_id`: ID of the user associated with the discount list.
  - `store_id`: ID of the store associated with the discount list user.

### Request Validation Rules

- **DiscountList Creation:**
  - `title`: Required, string, max 255 characters.
  - `store_id`: Required, must exist in the `stores` table.
  
- **DiscountListProduct Creation:**
  - `discount_list_id`: Required, must exist in the `discount_lists` table.
  - `product_id`: Required, must exist in the `products` table.
  - `quantity`: Required, integer, minimum 1.
  - `discount_amount`: Required, numeric, minimum 0.
  - `store_id`: Required, must exist in the `stores` table.
  
- **DiscountListUser Creation:**
  - `discount_list_id`: Required, must exist in the `discount_lists` table.
  - `user_id`: Required, must exist in the `users` table.
  - `store_id`: Required, must exist in the `stores` table.

