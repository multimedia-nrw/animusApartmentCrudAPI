# Animus Apartment CRUD Example

This is a simple CRUD application for Apartments for managing the properties information.
Version 1 of the API is limited to the essentials of the requirements as per the document provided: listing all the apartments, adding,editing and deleting the apartments.

***
# Technology Stack
## Frontend
- Angular 7
- node v6.6.x
- Added Components: Routes, rxjs, e2e (not needed though), angular-material (for designing the form and the pages as per material design standards), and angular-alerts (but they are not showing the alert when any new record is added, updated or deleted at the moment)

## Backend
- Laravel 5.5.*
- MySQL 5.7.x

***
#### Api URL Information and it's details
- Get all the apartments: http://phpstack-115345-722748.cloudwaysapps.com/api/apartments (GET)
- Store New Apartment: http://phpstack-115345-722748.cloudwaysapps.com/api/apartment/store (POST)
Expected Parameters:

```
property_id 
move_in_date (date format can be any, but it will be stored in yyyy-mm-dd)
street
postal_code
town
country
contact_email_address
```

- Delete an Apartment: http://phpstack-115345-722748.cloudwaysapps.com/api/apartment/delete/{token} (GET)
- Show an Apartment Details: http://phpstack-115345-722748.cloudwaysapps.com/api/apartment/{token} (GET)
- Update Apartment Info: 5) http://phpstack-115345-722748.cloudwaysapps.com/api/apartment/update
```
access_token (alphanumeric string of 16 characters unique by each apartment record)
property_id (property_id is similar to SKU, stored as per vendor's inventory)
move_in_date (date format can be any, but it will be stored in yyyy-mm-dd)
street
postal_code
town
country
contact_email_address
```

## Things that can be improved:
- Pagination support can be added
- Filtering can also be added

