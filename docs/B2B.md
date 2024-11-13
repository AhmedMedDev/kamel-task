### Feature Refinement: B2B Functionality for Onshop

#### Overview
This document outlines the features needed to clone the B2B functionality from Shopify and integrate it into our existing project, Onshop. The goal is to empower Onshop by providing a comprehensive guide to implement and manage business-to-business transactions within the platform, focusing on both business user and customer perspectives.

---

### 1. Business User Perspective

#### 1.1. Companies Management
The business user should be able to manage companies through their dashboard. This includes creating, updating, and deleting company records, as well as managing the relationships between companies and their employees.

**Features:**
- **Company Creation and Management:**
  - Fields: Company Name, Company ID (auto-generated), Customer ID (owner of the company), Payment Terms (Net 30, Net 60, etc.), Status (Active/Inactive).
  - Functionality: Create, update, delete, and view company details.
- **Employee Management:**
  - Fields: Customer IDs (employees associated with the company).
  - Functionality: Add or remove employees from a company, view a list of all employees associated with a company.
- **Role Assignment:**
  - Allow business users to assign specific roles or permissions to employees (e.g., Admin, Buyer).

#### 1.2. Pricing Lists Management
The business user should be able to create and manage pricing lists to apply specific adjustments to product prices for different companies.

**Features:**
- **Pricing List Creation and Management:**
  - Fields: Pricing List Name, Associated Company, Adjustment Type (percentage or fixed amount), Adjustment Value (e.g., +20%, -10%), List of Products.
  - Functionality: Create, update, delete, and view pricing lists.
- **Bulk Price Adjustments:**
  - Allow bulk price adjustments for groups of products.
  - Ability to apply different pricing lists to different companies.
- **Discount Management:**
  - Define discount rules (e.g., 20% off for all products for a specific company).
  - Set start and end dates for discounts.
  
---

### 2. Customer Perspective

#### 2.1. Discount Application
When employees of a company (customers) checkout, they should receive the specific discounts assigned to their company.

**Features:**
- **Automated Discount Application:**
  - Automatically apply relevant discounts from pricing lists based on the customer’s associated company during checkout.
- **Discount Visibility:**
  - Display applied discounts clearly in the shopping cart and during the checkout process.
- **Eligibility Check:**
  - Ensure that only customers associated with a company receive the designated discounts.
  
---

### Detailed Workflow

#### 1. Company Setup by Business User
1. **Create a Company:**
   - Navigate to the "Companies" section in the dashboard.
   - Click on "Add New Company" and fill in required fields (Company Name, Payment Terms, Owner Customer ID).
   - Save the company details.

2. **Add Employees to Company:**
   - Go to the "Companies" section, select the created company.
   - Click on "Manage Employees" and add Customer IDs.
   - Assign roles as needed.

3. **Create Pricing Lists:**
   - Navigate to the "Pricing Lists" section.
   - Click on "Create New Pricing List" and enter details (Pricing List Name, Associated Company, Adjustment Type, Adjustment Value).
   - Select products to include in the pricing list.
   - Save the pricing list.

4. **Assign Discounts:**
   - Define discount rules and set validity periods.
   - Apply these rules to the pricing lists.

#### 2. Customer Interaction
1. **Checkout Process:**
   - Customer logs in and adds products to the cart.
   - At checkout, the system checks the customer’s company association.
   - Apply relevant discounts from the pricing list.
   - Display the discount in the cart and checkout summary.

2. **Order Placement:**
   - Customer completes the purchase with the applied discounts.
   - Order confirmation reflects the discounted prices.

---

### Technical Considerations

#### Data Storage
- **Database Schema:**
  - Companies Table: Stores company details.
  - Employees Table: Links employees (Customer IDs) to companies.
  - Pricing Lists Table: Stores details of pricing lists.
  - Products Table: Links products to pricing lists.

#### API Endpoints
- **Company Management:**
  - POST /companies
  - GET /companies/{id}
  - PUT /companies/{id}
  - DELETE /companies/{id}
  - POST /companies/{id}/employees
  - DELETE /companies/{id}/employees/{employee_id}

- **Pricing Lists Management:**
  - POST /pricing-lists
  - GET /pricing-lists/{id}
  - PUT /pricing-lists/{id}
  - DELETE /pricing-lists/{id}

- **Discount Application:**
  - GET /checkout/discounts (applies discounts during the checkout process based on customer’s company).

---