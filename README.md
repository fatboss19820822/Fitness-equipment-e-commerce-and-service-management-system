# Fitness Equipment E-commerce and Service Management System

A comprehensive web application for managing fitness equipment sales, repairs, and installation services. Built with CakePHP 5.x, this system provides a complete solution for e-commerce operations and service management.

## Features

### E-commerce Functionality
- **Product Catalog**: Browse and manage fitness equipment with categories, pricing, and inventory tracking
- **Shopping Cart**: Add products to cart and manage quantities
- **Order Management**: Complete order processing with checkout and confirmation
- **Payment Integration**: PayPal payment gateway integration
- **Stock Management**: Track inventory levels for all products

### Service Management
- **Repair Requests**: Customers can submit repair service requests for their equipment
- **Installation Requests**: Request equipment installation services
- **Service Tracking**: Manage and track all service requests through the system

### User Management
- **Authentication System**: User registration, login, password reset functionality
- **Role-Based Access Control**: 
  - **Admin**: Full system access and dashboard
  - **Manager/Employee**: Access to orders, products, contacts, and service requests
  - **Customer**: Public product browsing, cart, and service request submission
- **User Profiles**: Manage user accounts and preferences

### Additional Features
- **Contact Management**: Handle customer inquiries and contact forms
- **Admin Dashboard**: Comprehensive dashboard for system overview
- **FAQ Section**: Frequently asked questions page
- **reCAPTCHA Integration**: Spam protection for forms
- **Responsive Design**: Mobile-friendly interface

## Technology Stack

- **Framework**: CakePHP 5.1+
- **PHP**: 8.1 or higher
- **Database**: MySQL/MariaDB
- **Payment Gateway**: PayPal REST API SDK
- **Security**: CakePHP Authentication & Authorization plugins
- **Form Protection**: Google reCAPTCHA

## Requirements

- PHP >= 8.1
- Composer
- MySQL/MariaDB database
- Web server (Apache/Nginx) or PHP built-in server
- PHP extensions: intl, mbstring, openssl, pdo, pdo_mysql

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/fatboss19820822/Fitness-equipment-e-commerce-and-service-management-system.git
   cd Fitness-equipment-e-commerce-and-service-management-system
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure the application**
   - Copy `config/app_local.example.php` to `config/app_local.php`
   - Update database configuration in `config/app_local.php`:
     ```php
     'Datasources' => [
         'default' => [
             'host' => 'localhost',
             'username' => 'your_username',
             'password' => 'your_password',
             'database' => 'your_database',
         ],
     ],
     ```

4. **Set up the database**
   - Create a MySQL database
   - Import the schema from `databaseschema.sql`:
     ```bash
     mysql -u your_username -p your_database < databaseschema.sql
     ```

5. **Configure environment variables**
   - Set up reCAPTCHA keys in `config/recaptcha.php` if needed
   - Configure PayPal credentials if using payment features

6. **Set permissions** (Linux/Mac)
   ```bash
   chmod -R 775 logs tmp
   ```

7. **Run the application**
   ```bash
   bin/cake server -p 8765
   ```
   Then visit `http://localhost:8765` in your browser.

## Project Structure

```
├── config/              # Configuration files
├── src/                 # Application source code
│   ├── Controller/      # Controllers
│   ├── Model/           # Models, Entities, Tables
│   ├── View/            # View classes
│   └── Policy/          # Authorization policies
├── templates/           # View templates
├── webroot/             # Public web root
│   ├── css/             # Stylesheets
│   ├── js/              # JavaScript files
│   └── img/             # Images
├── tests/               # Test files
└── databaseschema.sql   # Database schema
```

## Key Controllers

- **ProductsController**: Product catalog and cart management
- **OrdersController**: Order processing and checkout
- **RepairRequestsController**: Repair service management
- **InstallEquipmentRequestsController**: Installation service management
- **UsersController**: User authentication and management
- **AdminController**: Administrative dashboard
- **ContactsController**: Contact form handling

## Database Schema

The system includes the following main tables:
- `users` - User accounts and authentication
- `products` - Product catalog
- `orders` - Customer orders
- `order_items` - Order line items
- `repair_requests` - Repair service requests
- `install_equipment_requests` - Installation service requests
- `contacts` - Contact form submissions

## Development

### Running Tests
```bash
composer test
```

### Code Style Check
```bash
composer cs-check
```

### Code Style Fix
```bash
composer cs-fix
```

### Static Analysis
```bash
composer stan
```

## Configuration

### Database Configuration
Edit `config/app_local.php` to configure your database connection.

### Application Settings
Edit `config/app.php` for application-wide settings.

### reCAPTCHA Configuration
Configure reCAPTCHA keys in `config/recaptcha.php` for form protection.

## Security

- Password hashing using CakePHP's built-in security features
- CSRF protection enabled
- SQL injection prevention through ORM
- XSS protection in views
- Role-based authorization
- reCAPTCHA for form submissions

## License

MIT License

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Support

For issues and questions, please open an issue on the GitHub repository.

## Author

Developed as part of the Fitness Equipment E-commerce and Service Management System project.

---

Built with ❤️ using CakePHP
