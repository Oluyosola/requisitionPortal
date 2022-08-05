# PLATFORM REQUIREMENTS
- PHP 7^
- LARAVEL 8^


# INSTALLATION GUIDE
- Clone project 
- include a .env file in the project diectory, copy the content of .env.example into it and configure db details
- Run npm install to install node_modules folder
- Run composer install to have the vendor folder that includes dependencies
- create a db with the appropriate db name in the .env
- Kindly run php artisan migrate to set up the db
- Seed the website table using "php artisan db:seed" to seed data to neccessary tables.



# ABOUT
- Project : A full fledge requisition system that has all aspect of making requisition, approvals, and processes. Requisitions are done based on approval levels through to store where requisition is processed.

- Goal: To digitalize companies requisition processes

# Additional Registration Fields (Drop Down)
- Designation 
- Designation Type
- Reporting designation
- Reporting Designation Type

# Requisition Categories
- Store Items
- Assets 
- Services and Maintenance
- HR
- Other/ Non Assets

# DESIGNATION/ POSITIONS
- Officers
- Site Heads and Team Leads
- Managers
- Internal Control (C Level)
- Store

# NOTE: 
- By default all designations are Users. 
- Multiple requisition can be created once.
- Dynamic selection of options

# DASHBOARDS
- Officers/Users
- Approval/Rejection – SH, TL,Manager, IC 
- Store –  (Processes requisition, creates and manage requisition items)
