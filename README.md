# Car website
This website was developed during our challenge week, which took place over a period of 4 days. We were tasked with coding this website ‘by hand’ and could not use any 3rd party libraries.
The website shown is coded using a PHP / MYSQL backend, and a HTML / CSS frontend.

 

## Landing page
The landing page acts as the index for my website. This provides a simple web link to allow users to enter the car customisation menu.
![](https://github.com/guyjac/Car-website/blob/main/land.png)

## Car customisation menu
The car customisation page dynamically pulls down the information from my SQL database to create radio button options, images and pricing for my car. There is also JavaScript present on the page which will show the user what choices they have made when they click the button (without refreshing the page). This was intended to show an updated price, but this has not been implemented yet. Error checking is performed with this java, to stop users from not selecting enough options.
 
![](https://github.com/guyjac/Car-website/blob/main/custommenu.png)

## Your choice
Once the user has made a choice, they are taken to a choice summary page. Here, the final price of the car (with the extra options) is shown. The user can then opt to have the car emailed to them, by entering their email address.
In the backend of the system, the created choice will be queried against my list of unique choices (these are generated by hashing all the chosen components). If a unique combination is detected, a new entry will added to my database.
Once the user enters their email address and clicks submit, an email will be sent to them with the unique hash of their car.
In the backend, a user will be created, which will store their email address, and a link to the unique car.
Because of the way I have designed my database, multiple users can point to the same customisation. This will cut down on duplicated and waste data, and will help ensure that only unique data is present in my db.
 
 ![](https://github.com/guyjac/Car-website/blob/main/yoourconfig.png)
  ![](https://github.com/guyjac/Car-website/blob/main/youconfig.png)

## Email alert
An email will then be generated and sent to the user, with their choices, and with instructions on how they can view their car again.
  ![](https://github.com/guyjac/Car-website/blob/main/email.png)

## Find saved car
A user can enter a unique car hash into the search and display their car.

   ![](https://github.com/guyjac/Car-website/blob/main/search.png)
  ![](https://github.com/guyjac/Car-website/blob/main/result.png)

## Admin pages
The admin page allows the administrator to view all tables in the database.
  ![](https://github.com/guyjac/Car-website/blob/main/admin.png)

## Add a car
The admin page also allows an admin to add a new car. This will later be changed to add optional extras too.
 
 ![](https://github.com/guyjac/Car-website/blob/main/add_car.png)
 
 
 ## Schema
 ![](https://github.com/guyjac/Car-website/blob/main/dummy_database/dbschema.PNG)
 ![](https://github.com/guyjac/Car-website/blob/main/dummy_database/dbschema1.PNG)
