# Contacts Management System

## Description

The Contacts Management System is a web application that allows users to manage their contacts. It provides functionalities such as adding new contacts, editing existing ones, and categorizing contacts into different categories.

## Features

- **Contact Management:** Add, edit, and view contact details.
- **Category Categorization:** Categorize contacts into different categories.
- **Dashboard:** View statistics and information about contact categories.

## Technologies Used

- **Frontend:** HTML, CSS, JavaScript, jQuery
- **Backend:** PHP
- **Database:** MySQL
- **Library:** DataTables (for tabular data)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/modouaicha023/sama-contacts.git
   ```

2. Configure the database:

   - Create a MySQL database.
   - Import the provided SQL schema (`schema.sql`) into your database.

3. Update database credentials:

   - Open `contact.class.php` file.
   - Update the database connection details:

     ```php
     private $DB_DHN = "mysql:host=localhost;dbname=your_database_name";
     private $DB_USERNAME = "your_database_username";
     private $DB_PASSWORD = "your_database_password";
     ```

4. Deploy the application:

   - Host the project on a web server (e.g., Apache, Nginx).
   - Access the application through the web browser.

## Usage

1. Open the application in your web browser.
2. Manage contacts through the provided interface.
3. Use the dashboard to view category statistics.

## Contributors

- [Modou Aicha Diop](https://github.com/modouaicha023)
---

Make sure to replace placeholders such as "your-username," "your_database_name," etc., with the appropriate information for your project. Additionally, include any specific instructions or considerations relevant to your project.
