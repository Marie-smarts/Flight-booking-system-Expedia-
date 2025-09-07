# 📂 Controllers Directory

This folder contains all the PHP controller scripts for the Xpedia Flight Booking System. Each controller handles AJAX requests and business logic for a specific entity or feature in the application. Controllers interact with the Models to perform CRUD operations and return data (usually in JSON format) to the frontend.

## 📜 List of Controllers

- **airlineoperations.php**  
  Handles airline-related operations (add, edit, delete, list airlines).

- **airportoperations.php**  
  Manages airport data and operations.

- **bookingclassoperations.php**  
  Handles booking class management (e.g., Economy, Business).

- **bookingoperations.php**  
  Manages flight bookings, including creation, update, and deletion.

- **bookingsupplyoperations.php**  
  Handles supply-side booking operations.

- **bookingtypeoperations.php**  
  Manages different types of bookings.

- **cityoperations.php**  
  Handles city-related CRUD operations.

- **countryoperations.php**  
  Manages country data and operations.

- **currencyoperations.php**  
  Handles currency management for bookings and pricing.

- **flightsupplyoperations.php**  
  Manages flight supply data and operations.

- **genderoperations.php**  
  Handles gender options for passenger management.

- **identificationoperations.php**  
  Manages identification types for passengers.

- **passengermanifestoperations.php**  
  Handles passenger manifest data and operations.

- **paymentmethodoperations.php**  
  Manages payment methods for bookings.

## 🛠️ Usage

These controllers are typically called via AJAX from the frontend (JavaScript), and they return responses in JSON format for dynamic page updates.

## 📚 Related

- See the `Models/` directory for the PHP classes used by these controllers.
- See the main [README.md](../README.md) for overall project structure and setup.

---
**Xpedia Flight