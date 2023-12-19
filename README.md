<div align="center">
    <h1>Tugas Besar</h1>
    <h3>II3160 - Teknologi Sistem Terintegrasi</h3>
</div>
<br>

## List of Contents

1. [System Overview](#system-overview)
2. [Core Domain](#core-domain)
3. [Team Members](#team-members)
4. [Tech Stack](#tech-stack)
5. [How to Run](#how-to-run)
6. [Deployment](#deployment)
7. [Features](#features)
8. [Documentation](#documentation)

## System Overview

TST-Ticket merupakan suatu sistem layanan pembelian tiket pesawat yang hadir dengan tujuan untuk memudahkan customer melakukan pembelian tiket dari maskapai-maskapai yang ada dan sesuai dengan yang diinginkannya karena melakukan filtering dari rute penerbangan, jadwal, serta jumlah kursi yang diinginkan.

## Core Domain

Menerima jadwal penerbangan dan mengatur sistem ticketing, termasuk penunjukkan jadwal, penghargaan kursi, penerimaan identitas penumpang, serta riwayat pembelian.

## Team Members

<table>
    <tr align="center">
        <th>No.</th>
        <th>Nama</th>
        <th>NIM</th>
    </tr>
    <tr>
        <td>1.</td>
        <td>Kevin Prayoga Abdinegara</td>
        <td>18221141</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Rayhan Nugraha Putra Siregar</td>
        <td>18221149</td>
    </tr>
    <tr>
        <td>3.</td>
        <td>Hans Stephano Edbert Njotohardjo</td>
        <td>18221171</td>
    </tr>
</table>

## Tech Stack

- PHP
- Codeigniter 4 
- Bootstrap
- MySQL
- phpMyAdmin
- XAMPP
- Postman
- Github dan Git
- Visual Studio Code

## How to run

1. Clone respository ini dan [repository OnlyFlights](https://github.com/SirRay03/TST-Air)

2. Buka dan masuk ke dalam kedua repository di jendela yang berbeda

3. Copy content .env.example ke dalam .env

4. Download & install XAMPP [Link](https://www.apachefriends.org/)

5. Buka XAMPP, lalu run Apache & MySQL (phpMyAdmin) Service

6. Setup aplikasi menggunakan command berikut

```
composer install
composer update
```

7. Masukkan database yang disimpan dalam root folder masing-masing repository ke dalam [phpMyAdmin](localhost/phpmyadmin)

8. Jalankan aplikasi menggunakan command berikut pada terminal setiap jendela

TST-Ticket  ```php spark serve --port 3000```
OnlyFlights ```php spark serve --port 8080```

6. Service TST-Ticket berjalan pada http://localhost:3000 dan OnlyFlights berjalan pada http://localhost:8080

7. Berikut informasi akun yang dapat digunakan untuk login
```
# Login TST-Ticket
username: ilmagita
password: akujember

# Login Onlyflights
username: admin@onlyflights.18s
password: password123
```


## Features

1. **Login** - Login menjadi langkah pertama bagi pengguna untuk dapat mengakses sistem untuk mencegah penggunaan yang tidak bertanggung jawab.

2. **Search for Flights** - User dapat mencari penerbangan berdasarkan bandara keberangkatan, tujuan, tanggal, serta jumlah penumpang.

3. **Book Flights** - User dapat melakukan pemesanan terhadap penerbangan yang ditampilkan.
  
4. **Add Passenger Details** - User dapat mengisi data penumpang sesuai dengan jumlah tiket atau kursi yang ingin dipesan.
   
5. **Booking History** - User dapat melihat riwayat pemesanan tiket yang dapat dikategorikan menjadi Success, Pending, atau Failed.

6. **Pay or Cancel** - User dapat memilih untuk melakukan pembayaran dengan harga sejumlah kursi yang dipesan pada pemesanan yang masih berstatus pending pada riwayat.


## Documentation
[Documentation](https://docs.google.com/document/d/11VVUq3s6EbKkoQnYY_Sl7ymabZufGoWuneDM68WyuzY)

*Development processes and interfaces are provided in the document.*
