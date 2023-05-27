-- Active: 1684741582071@@127.0.0.1@5432@mahaprint

CREATE DATABASE mahaPrint;

\c mahaPrint;

\dt+;

CREATE DATABASE mahaPrint;

CREATE TABLE
    users (
        userID SERIAL PRIMARY KEY,
        namaLengkap VARCHAR(50) NOT NULL,
        alamat VARCHAR(255) NOT NULL,
        noTelp VARCHAR(20) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL
    );

CREATE TABLE
    admins (
        adminID SERIAL PRIMARY KEY,
        namaAdmin VARCHAR(255) NOT NULL
    );

CREATE TABLE
    product (
        productID SERIAL PRIMARY KEY,
        jenisProduk VARCHAR(10) NOT NULL,
        ukuran FLOAT NOT NULL CHECK (ukuran > 0),
        bahan VARCHAR(255) NOT NULL,
        harga FLOAT NOT NULL
    );

CREATE TABLE
    spanduk (
        productID INT PRIMARY KEY REFERENCES product(productID),
        lebar FLOAT NOT NULL,
        panjang FLOAT NOT NULL
    );

CREATE TABLE
    makalah (
        productID INT PRIMARY KEY REFERENCES product(productID),
        ukuranKertas VARCHAR(10) NOT NULL
    );

CREATE TABLE
    poster (
        productID INT PRIMARY KEY REFERENCES product(productID),
        lebar FLOAT NOT NULL,
        panjang FLOAT NOT NULL,
        frame BOOLEAN NOT NULL
    );

CREATE TABLE
    orders (
        orderID SERIAL PRIMARY KEY,
        productID INT NOT NULL,
        userID INT NOT NULL,
        jumlahOrder INT NOT NULL,
        tglOrder DATE NOT NULL,
        FOREIGN KEY (productID) REFERENCES product(productID),
        FOREIGN KEY (userID) REFERENCES users(userID)
    );