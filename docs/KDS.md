## A SRS document outlines features of the kitchen display system

### 1. Order Management

**Objective**: Display orders in real-time as they are received from the POS system.

**Details**:
- The frontend application should fetch orders from the `/api/orders` endpoint.
- Orders should be displayed in a clear and organized manner, showing relevant details such as order number, items, and customer information.
- Implement real-time updates by subscribing to the `new-order-placed` channel to receive notifications when new orders are placed.

### 2. Order Prioritization

**Objective**: Allow kitchen staff to prioritize orders based on urgency or other criteria.

**Details**:
- The frontend can interact with the backend's order management APIs to control the priority field for each order.
- When a user wants to change the priority of an order, the frontend sends a request to the backend API endpoint responsible for updating order details, such as /api/orders/{order_id}.
- The request payload includes the updated priority value for the order.
- Upon receiving the request, the backend validates the data and updates the priority field in the database for the specified order.

### 3. Color-coded Alerts

**Objective**: Use different colors to signify the status of each order.

**Details**:
- Define an enumeration (`OrderStatusColorsEnum`) to map order statuses to specific colors (e.g., `PENDING` maps to yellow, `ACCEPTED` maps to green, `REJECTED` maps to red).
- Apply color-coded alerts to each order item or overview section of the kitchen display to provide visual cues on order status.
- Ensure consistency in color usage across the application to maintain clarity and readability of alerts.

### 4. Customizable Views

**Objective**: Enable kitchen staff to customize the display layout based on their workflow and preferences.

**Details**:
- Provide an intuitive interface for kitchen staff to customize the layout, such as rearranging order panels or adjusting column widths.
- Save user preferences to persist customizations across sessions.
- Implement drag-and-drop functionality or configurable settings to facilitate customization.

### 5. Item Details

**Objective**: Provide detailed information for each item in an order, including any modifications or special instructions.

**Details**:
- Fetch orders along with their associated items from the `/api/order?include=items` endpoint.
- Display item details such as descriptions, quantities, and special instructions alongside each order item.
- Implement expandable/collapsible sections or modal pop-ups to show additional item details when clicked.

### 6. Order Tracking

**Objective**: Track the progress of each order from preparation to delivery, including timing metrics.

**Details**:
- Include the tracking relation when fetching orders from the `/api/order` endpoint.
- Retrieve information such as `preparation_start_time`, `preparation_end_time`, `out_for_delivery_time`, `delivered_time`, `delivery_lat`, and `delivery_lng` from the order tracking relation.
- Display tracking information to provide visibility into the progress of each order, including timing metrics and delivery location.

### 7. Real-time Updates

**Objective**: Ensure that the display updates in real-time to reflect any changes or new orders.

**Details**:
- Utilize technologies like WebSockets or AJAX polling to fetch and display real-time updates from the server.
- Update the display immediately when new orders are received or when the status of existing orders changes.
- Implement efficient data synchronization mechanisms to minimize latency and ensure timely updates.

### 9. Offline Support

**Objective**: Have a backup plan in case of internet outages to ensure continuous operation.

**Details**:
- Implement local storage mechanisms to store data temporarily on the client side in case of internet outages.
- Provide offline capabilities for viewing and managing orders, with synchronization once the connection is restored.
- Notify users of the offline mode and any limitations or restrictions that may apply.

### 10. Customizable Alerts

**Objective**: Allow kitchen staff to set up alerts for specific conditions, such as a large order or a high number of modifications.

**Details**:
- Provide an interface for kitchen staff to configure custom alerts based on predefined conditions or criteria.
- Allow customization of alert thresholds, notification preferences, and delivery methods.
- Implement robust alerting mechanisms to ensure timely notification and escalation of critical events.