# ✈️ Xpedia Flight Booking System

Xpedia is a **web-based flight booking system** designed to manage airlines, airports, passengers, bookings, and other related entities. It’s made with **PHP (OOP + MySQL stored procedures)**, **HTML**, **Bootstrap**, and **JavaScript (jQuery)**.  

The system makes airline operations and booking management easier while keeping the interface simple and responsive.

## 🚀 What it Does

- 🌍 **Countries:** Add, edit, and view countries. Each country can have multiple cities and airports.  
- 🏙️ **Cities:** Manage cities linked to countries.  
- 🛫 **Airports:** Add and manage airports, connect them to cities and countries.  
- 🏢 **Airlines:** Handle airlines and their operations.  
- 📑 **Bookings:** Manage flight bookings, booking classes, booking types, and payment methods.  
- 👥 **Passenger Info:** Keep track of passenger details like ID, gender, and booking info.  
- 💱 **Currencies:** Handle multiple currencies for pricing and bookings.  
- 🪪 **ID Types:** Manage passenger identification documents.  
- 🚻 **Genders:** Manage gender options for passengers.  
- 💻 **UI:** Responsive, clean interface using Bootstrap and Font Awesome icons.  

## 📁 Project Layout

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

- **Country.html:** Main interface for managing countries.  
- **Controllers/:** PHP scripts handling AJAX requests and business logic.  
- **Models/:** Classes for database operations, one per entity.  
- **JS/:** JavaScript for interactivity (like `country.js`).  
- **CSS/:** Styling (Bootstrap + Font Awesome).  
- **ExpediaDB/:** SQL scripts for database schema and stored procedures.  

## 🗄️ Database

- Uses **MySQL** with stored procedures for all CRUD operations.  
- See [`ExpediaDB/ExpediaFlightBookingDB.sql`](ExpediaDB/ExpediaFlightBookingDB.sql) for the schema and procedures.  

## 🛠️ How to Run It

1. **Clone this repo** into your local server (like `htdocs` in XAMPP).  
2. **Set up the database:**  
   - Open phpMyAdmin.  
   - Create a database named `expediaflightbooking`.  
   - Import `ExpediaDB/ExpediaFlightBookingDB.sql`.  
3. **Check PHP setup:**  
   - Make sure PHP & MySQL are running (XAMPP or similar).  
   - Default credentials (`root` / no password) should work.  
4. **Open the app:**  
   - Go to `Country.html` in your browser via local server (e.g., `http://localhost/Xpedia/Country.html`).  

## 🧰 Tech Stack

- **Backend:** PHP (OOP), MySQL (stored procedures)  
- **Frontend:** HTML, Bootstrap, Font Awesome, jQuery  
- **AJAX:** Dynamic data updates without page reloads  

## 🤝 Contributing

Pull requests are welcome. For major changes, open an issue first to discuss.  

## 📄 License

For educational purposes only.  

---

**Xpedia Flight Booking System** ✈️  
Manage airlines and bookings efficiently with a simple, clean interface.
