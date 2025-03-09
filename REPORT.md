# AWDev_Project
**Kieu Thanh Tung - 22010214**
## About the Project
This is a library management system that integrates a user-friendly UI, allowing regular users to browse and borrow books online. The project aims to provide a flexible and convenient platform for users. Upon logging in, users are redirected to an appropriate interface based on their roles.

> Detailed project documentation is available [here](https://docs.google.com/document/d/1Df2reCq2rOcy1ufzP1BKQUjYHa5Vu8SfiUKS63-Xpwc/edit?usp=sharing).

### Technologies Used:
- Laravel Framework
- OOP PHP
- MVC Architecture

### Main Features:
- **Admin Role:**
  - Manage users and books (add, edit, delete)
  - Review and approve book borrowing requests
  - Monitor borrowing and returning transactions
- **User Role:**
  - Browse available books in the library
  - Request to borrow books

---

## Project: Kayti Library

### Website Link: [Visit Here](https://web-production-12af.up.railway.app/)

## Deployment Guide (Local Development Environment)
---
### 1. Clone the Repository:
```bash
git clone https://github.com/kieutung52/AdvancedWeb_Project.git
cd AdvancedWeb_Project
```

### 2. Install Dependencies:
```bash
composer install
npm install
```

### 3. Set Up Environment Variables:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database Settings:
Edit the `.env` file to match your local database credentials.

### 5. Run Migrations and Seed the Database:
```bash
php artisan migrate --seed
```

### 6. Start the Local Development Server:
```bash
npm run dev
php artisan serve
```

### 7. Access the Application:
Open your browser and navigate to [http://localhost:8000](http://localhost:8000).

---
## UML
### **Class Diagram**
![Class Diagram](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20102828.png)
### **Use Case Diagram**
![Use Case Diagram](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20095627.png)
### **Use Case:Borrow Request**
![Use Case:Borrow Request](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20101620.png)
### **Sequence Diagram:Borrow Request**
![Sequence Diagram:Borrow Request ](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20101923.png)
### **Use Case: Approve book borrowing request**
![Use Case: Approve book borrowing request](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20102348.png)
---
## Screenshots
### **Authentication**
![Login, Register](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20051056.png)

### **Admin Role**
![Dashboard](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20051147.png)
![Books](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20051237.png)
![Users](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20051221.png)

### **User Role**
![Home](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20051321.png)
![Book Shelf](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20051357.png)
![Transactions](./images_for_readme/imagesForWebsite/Screenshot%202025-02-28%20051423.png)

---

### 🚀 Happy Coding!

