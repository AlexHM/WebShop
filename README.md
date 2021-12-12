# ENFFY
## Index

* Dependencies
* Database
* Structure
* Authors

### Dependencies

This project has two main dependencies.

1. [FPDF Library](http://www.fpdf.org/)
2. [Xampp](https://www.apachefriends.org/es/download.html)


 To run the web application it is necessary to implement a sql server such as xamp bitnami to be able to execute the libraries and the php code.The FPDF Library is necessary to generate an invoice to the user simulating a completed purchase

## Databse

| Tables  
| -------------  
| User           
| bought_products
| user_products  
| promo_code     
| products   

Main tables of the database that is incorporated in the DB folder

## Structure

The application has some navigation screens, which include:

#### 1. Log In
![login](https://raw.githubusercontent.com/AlexHM/WebShop/Development/NFTS/media/login.png)
#### Log in where the user can log in and be remembered through cookies
#### 2. Sign Up
![signup](https://raw.githubusercontent.com/AlexHM/WebShop/Development/NFTS/media/signUP.png)
#### User registration for later storage in the database, includes handling of errors such as: empty fields, incorrect email, passwords do not match, terms of use ...
#### 3. Landing Page
![landingPage](https://raw.githubusercontent.com/AlexHM/WebShop/Development/NFTS/media/landingPage.png)
#### Main page where products are purchased and added to the cart. When viewing the product detail, a modal is returned with detailed information
#### 4. Shopping Card
![shoppingCard](https://raw.githubusercontent.com/AlexHM/WebShop/Development/NFTS/media/shoppingCard.png)

#### Final page where you can delete the products previously added and finalize the purchase by generating a purchase ticket

## Authors

DPTO Frontend
- [Ángel Blanco](https://github.com/AngelBlanco97)
- [Xavier Girón](https://github.com/XaviGT10)

DPTO Backend
- [Alberto Roselló](https://github.com/AprKali)
- [Alejandro Honrubia](https://github.com/AlexHM)
