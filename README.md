# VeloCars

VeloCars is a full-featured car shop management platform designed to streamline vehicle sales, rentals, and the entire maintenance workflow for used cars. It provides an intuitive interface for administrators to manage their inventory and a seamless experience for customers to browse, buy, and rent vehicles.

A key feature is the integrated repair management system. When used cars are registered, the system automatically notifies the appropriate personnel about necessary fixes, ensuring every vehicle is in prime condition before being listed for sale or rent.

---

### Features

- **Inventory Management:** Admins can easily add, edit, and remove new and used cars from the inventory.
- **Sales & Rentals:** A customer-facing portal allows users to view available cars and complete transactions for purchase or rental.
- **Integrated Repair Workflow:** A dedicated system for managing used cars, alerting staff to required fixes before the vehicles can be made available.
- **User Management:** Secure accounts for both customers and administrators with different access levels.
- **Search & Filtering:** Customers can search and filter vehicles by make, model, year, and price.

---

### Technologies Used



- **Frontend:** Vue.js, Tailwind CSS
- **Backend:** Laravel
- **Database:** MySQL
- **Build Tool:** Vite

---

### Installation

1.  Clone the repository:
    ```bash
    git clone [https://github.com/TitanDevX/VeloCars.git](https://github.com/TitanDevX/velocars.git)
    ```
2.  Navigate to the project directory:
    ```bash
    cd carvelo
    ```
3.  Install dependencies:
    ```bash
    npm install
    composer install
    ```
4.  Set up your environment variables:
    ```bash
    cp .env.example .env
    ```
    *(Fill in your database and other credentials in the `.env` file.)*
5.  Run database migrations:
    ```bash
    php artisan migrate
    ```
6.  Start the development server:
    ```bash
    npm run dev
    ```

---

### License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
