<p align="center">
  <a href="https://foodsaver.site" target="_blank">
    <img src="https://github.com/Ryldi/FoodSaver/blob/main/public/img/logo.png" width="400" alt="FoodSaver Logo">
  </a>
</p>


## About FoodSaver

**FoodSaver** FoodSaver is a website aimed at selling surplus food from fast-food restaurants or bakeries and cake shops. The food is still fresh and safe for consumption but would otherwise be discarded according to SOPs. The platform was developed as part of a university project using the following technologies:

- **Framework**: Laravel
- **Frontend**: Tailwind
- **Database**: MySQL
- **Container Orchestration**: Kubernetes
- **Deploy**: Docker

### Features for Customers  

1. **User Authentication**  
   - Customers can register and log in using their email and password.  
   - OTP verification is sent via email during registration to ensure secure access.  

2. **Homepage**  
   - Before logging in, customers can view:  
     - Information about the platform.  
     - Special promotions.  
     - Positive impact statistics from FoodSaver.  
     - A list of partner restaurants.  

3. **Restaurant Search & Display**  
   - Customers can search for partner restaurants offering surplus food.  
   - Search functionality includes:  
     - Filters by category.  
     - Pagination for browsing results.  
   - Each restaurant profile displays:  
     - Ratings.  
     - Description.  
     - Address.  
     - Product details.  

4. **Promotions & Coupons**  
   - Customers can view and claim promotional coupons.  
   - Coupons can be applied during checkout for discounts.  

5. **Cart Management & Payment**  
   - Customers can add food items to their cart.  
   - Apply claimed coupons during checkout.  
   - Payments are securely processed using the MidTrans Payment Gateway.  

6. **Order Tracking & Notifications**  
   - Customers can view order history and track current orders.  
   - Receive real-time notifications about order status.  

7. **Customer Feedback**  
   - Customers can leave reviews and ratings after completing an order.  

8. **Profile Management**  
   - Customers can edit their profile information, including:  
     - Profile photo.  
     - Password.  

---

### Features for Restaurants  

1. **Restaurant Authentication**  
   - Restaurants can register and log in using their email and password.  
   - OTP verification is sent via email for secure account access.  

2. **Product Management**  
   - Restaurants can:  
     - Add new food items.  
     - Manage stock and prices.  
     - Remove outdated products.  

3. **Promotion Management**  
   - Restaurants can:  
     - Create, edit, or delete discount promotions.  
     - Set conditions like percentage discounts and promo codes.  

4. **Order Management**  
   - Restaurants can manage incoming orders by updating statuses, such as:  
     - Paid.  
     - Prepared.  
     - Completed.  
   - View detailed order information for each customer.  

5. **Order Notifications**  
   - Restaurants receive notifications for new orders.  
   - Update and track order statuses in real time.  

6. **Restaurant Profile Management**  
   - Restaurants can edit their profile information, including:  
     - Description.  
     - Address.  
     - Account password.  


### Installation

Follow these steps to set up the project locally:

1. Clone the repository:  
   ```bash
   git clone https://github.com/Ryldi/FoodSaver.git
   cd FoodSaver
   composer install
   npm install
   create env and generate app key
   turn on your mySQL
   php artisan migrate
   php artisan db:seed
   npm run dev / build
   php artisan serve
