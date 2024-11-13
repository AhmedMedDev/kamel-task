## Comments Module Documentation

The Comments Module allows users to leave comments on various entities within the application.

### Endpoints

#### 1. Comments

- **Get Comments**
  - **Endpoint:** `GET /comments`
  - **Description:** Retrieves all comments associated with the authenticated user.

- **Create Comment**
  - **Endpoint:** `POST /comments`
  - **Description:** Creates a new comment for a specific entity.
  
- **Update Comment**
  - **Endpoint:** `PUT /comments/{comment_id}`
  - **Description:** Updates an existing comment.
  
- **Delete Comment**
  - **Endpoint:** `DELETE /comments/{comment_id}`
  - **Description:** Deletes an existing comment.

### Models

#### 1. Comment

- **Attributes:**
  - `id`: Unique identifier for the comment.
  - `customer_id`: ID of the customer who posted the comment.
  - `commentable_id`: ID of the entity the comment belongs to.
  - `commentable_type`: Type of the entity the comment belongs to.
  - `content`: Text content of the comment.
  
- **Relationships:**
  - `customer`: Belongs to a customer who posted the comment.
  - `commentable`: Morphs to the entity the comment belongs to.

### Request Validation Rules

- **Comment Creation:**
  - `commentable_id`: Required, integer.
  - `commentable_type`: Required, string.
  - `content`: Required, string, max 255 characters.

- **Comment Update:**
  - `content`: String, max 255 characters.

### Global Scopes

- **User Scope:** Filters comments based on the authenticated user. Non-admin users can only retrieve their own comments.

### Events

- **Creating Event:** Automatically sets the `customer_id` field to the ID of the authenticated customer.

### Factories

- **CommentFactory:** Generates fake data for comments.
