# ✈️ Xpedia Flight Booking System

Xpedia is a web-based flight booking management system designed to handle airline operations, airport management, passenger manifests, bookings, and related entities. The project is built using PHP (with MySQL stored procedures), HTML, CSS (Bootstrap), and JavaScript (jQuery).

## 🚀 Features

- 🌍 **Country Management:** Add, edit, and view countries. Each country can have multiple cities and airports.
- 🏙️ **City Management:** Manage cities associated with countries.
- 🛫 **Airport Management:** Manage airports, including linking them to cities and countries.
- 🏢 **Airline Operations:** Manage airlines and their operations.
- 📑 **Booking Management:** Create and manage flight bookings, booking classes, booking types, and payment methods.
- 👥 **Passenger Manifest:** Manage passenger details, including identification, gender, and booking information.
- 💱 **Currency Management:** Handle multiple currencies for bookings and pricing.
- 🪪 **Identification Types:** Manage identification documents for passengers.
- 🚻 **Gender Management:** Manage gender options for passengers.
- 💻 **User Interface:** Responsive UI using Bootstrap and Font Awesome for icons.

## 📁 Project Structure

```
Country.html
Controllers/
    airlineoperations.php
    airportoperations.php
    bookingclassoperations.php
    bookingoperations.php
    bookingsupplyoperations.php
    bookingtypeoperations.php
    cityoperations.php
    countryoperations.php
    currencyoperations.php
    flightsupplyoperations.php
    genderoperations.php
    identificationoperations.php
    passengermanifestoperations.php
    paymentmethodoperations.php
CSS/
    all.min.css
    bootstrap.min.css
ExpediaDB/
    ExpediaFlightBookingDB.sql
Images/
JS/
    country.js
    ...
Models/
    airport.php
    booking.php
    city.php
    country.php
    currency.php
    db.php
    gender.php
    identification.php
    passengermanifest.php
    ...
webfonts/
```

- **Country.html:** Main UI for managing countries.
- **Controllers/:** PHP scripts handling AJAX requests and business logic for each entity.
- **Models/:** PHP classes for database operations, each corresponding to a domain entity.
- **JS/:** JavaScript files for client-side interactivity (e.g., `country.js`).
- **CSS/:** Stylesheets (Bootstrap, Font Awesome).
- **ExpediaDB/:** SQL scripts for database schema and stored procedures.

## 🗄️ Database

- MySQL database with stored procedures for all CRUD operations.
- See [`ExpediaDB/ExpediaFlightBookingDB.sql`](ExpediaDB/ExpediaFlightBookingDB.sql) for schema and procedures.

## 🛠️ Setup Instructions

1. **Clone the repository** to your local server directory (e.g., `htdocs` for XAMPP).
2. **Import the database:**
   - Open phpMyAdmin.
   - Create a database named `expediaflightbooking`.
   - Import `ExpediaDB/ExpediaFlightBookingDB.sql`.
3. **Configure PHP:**
   - Ensure PHP and MySQL are running (e.g., via XAMPP).
   - No additional configuration is needed if using default credentials (`root` with no password).
4. **Access the application:**
   - Open `Country.html` in your browser via your local server (e.g., `http://localhost/Xpedia/Country.html`).

## 🧰 Technologies Used

- **Backend:** PHP (OOP), MySQL (with stored procedures)
- **Frontend:** HTML, Bootstrap, Font Awesome, jQuery
- **AJAX:** For dynamic data loading and operations

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## 📄 License

This project is for educational purposes.

---

**Xpedia Flight Booking System** ✈️  
Manage your airline