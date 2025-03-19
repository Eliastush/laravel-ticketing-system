
<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/your-username/ticketing-system/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://opensource.org/licenses/MIT">
    <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License">
  </a>
</p>

---

# Laravel Ticketing System  

A modern event ticketing system built with Laravel. This application enables users to book event tickets, generate QR codes for verification, and download their tickets as PDFs.  

This project is **free to use** and open-source. Feel free to contribute or modify as needed.  

---

## Features  

- Event Management: Create, edit, and delete events  
- Ticket Booking: Users can purchase tickets with name and email  
- QR Code Generation: Each ticket has a unique QR code  
- PDF Ticket Download: Downloadable and shareable e-tickets  
- Bootstrap 5 UI: Responsive and user-friendly interface  

---

## Screenshot  

<p align="center">
  <img src="screenshot.png?text=Project+Screenshot" alt="Project Screenshot">
</p>

---

## Installation  

Clone the repository:  
```sh
git clone https://github.com/Eliastush/ticketing-system.git
cd ticketing-system
```

Install dependencies:  
```sh
composer install
npm install
```

Set up the environment:  
```sh
cp .env.example .env
php artisan key:generate
```
> Update `.env` with your database credentials.  

Run migrations:  
```sh
php artisan migrate --seed
```

Start the server:  
```sh
php artisan serve
```

Now visit **[http://127.0.0.1:8000](http://127.0.0.1:8000)** in your browser.  

---

## Usage  

- Browse available events on the homepage  
- Book tickets by entering your details  
- View and manage bookings  
- Scan QR codes for verification  
- Download and print your e-tickets  

---

## Technologies  

- Laravel  
- PHP  
- Bootstrap 5  
- QR Code Generator  
- MySQL  

---

## Contributing  

This project is open-source and welcomes contributions. Feel free to fork the repository and submit pull requests.  

---

## License  

This project is licensed under the **MIT License**.  

---

If you find this project useful, consider giving it a ⭐ on GitHub.  
```
