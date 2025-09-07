# 🗂️ Models Directory

This folder contains all the PHP model classes for the Xpedia Flight Booking System. Each model represents a specific entity in the application and is responsible for interacting with the database, typically performing CRUD operations and business logic.

## 📄 List of Models

- **airline.php**  
  Model for airline data and operations.

- **airport.php**  
  Model for airport data and operations.

- **booking.php**  
  Handles flight booking data and related operations.

- **bookingclass.php**  
  Model for booking classes (e.g., Economy, Business).

- **bookingsupply.php**  
  Handles supply-side booking data.

- **bookingtype.php**  
  Model for different booking types.

- **city.php**  
  Model for city data and operations.

- **Country.php**  
  Model for country data and operations.

- **currency.php**  
  Handles currency data and operations.

- **db.php**  
  Database connection and utility functions (used by other models).

- **flightsupply.php**  
  Model for flight supply data.

- **gender.php**  
  Handles gender options for passengers.

- **identification.php**  
  Model for identification types (e.g., passport, ID card).

- **passengermanifest.php**  
  Handles passenger manifest data and operations.

- **paymentmethod.php**  
  Model for payment methods.

## 🛠️ Usage

These models are used by the controllers in the `Controllers/` directory to perform database operations and encapsulate business logic for each entity.

## 📚 Related

- See the `Controllers/` directory for scripts that use these models.
- Refer to the main [README.md](../README.md) for overall project structure and setup.

---

**Xpedia Flight Booking System –