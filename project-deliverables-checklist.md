# Project Planning & Deliverables

## 🎯 Project Goal
Refer to: [Assignment: Backend Development with Laravel](assignment-instruction/Backend%20Development%20with%20Laravel%20Assignment.pdf)

## 📅 Timeline
Start: 17-12-2025\
Deadline: 21-12-2025, 11:59 PM

## Part A: Project Setup (25 marks)

- [ ] Create a system that can manage product inventory, with backend API that allow:
    - [x] View all products
    - [x] View a single product
    - [x] Create a new product
    - [x] Update an existing product
    - [x] Delete a product

- [x] Screenshot of .env database configurations
- [x] Screenshot of successful `php artisan migrate` output

## Part B: Model & Migrations (25 marks)

- [x] Create a model named `Product` with the following attributes:
    - [x] `id` (primary key)
    - [x] `name` (string, 255)
    - [x] `description` (text, nullable)
    - [x] `price` (decimal, 10, 2)
    - [x] `stock` (int, default 0)
    - [x] `created_at` (timestamp)
    - [x] `updated_at` (timestamp)

- [x] `Product.php` Model file in `app/Models` folder
- [x] Migration file in `database/migrations` folder
- [x] Screenshot showing migration ran successfully

## Part C: Controller & Routes (25 marks)

- [x] Create a `ProductController.php` with these endpoints:
    - [x] `GET` method, `api/products` endpoint, `index` action that list all products
    - [x] `GET` method, `api/products/{id}` endpoint, `show` action that show a single product
    - [x] `POST` method, `api/products` endpoint, `store` action that create a new product
    - [x] `PUT` method, `api/products/{id}` endpoint, `update` action that update an existing product
    - [x] `DELETE` method, `api/products/{id}` endpoint, `destroy` action that delete a product

- [x] Requirements:
    - [x] All responses return JSON format
    - [x] Use correct HTTP status codes
        - [x] `200` for success
        - [x] `201` for created
        - [x] `404` for not found
        - [x] `422` for validation errors
        - [x] `500` for server error
    - [x] Validate input for `store` and `update` actions
    - [x] Handle missing products with `404` response

- [x] `app/Http/Controllers/ProductController.php`
- [x] `routes/api.php`

## Part D: API Testing with Bruno API Client (25 marks)

- [x] Test all endpoints using Bruno and provide clear screenshots showing request and response of the following:
    1. [x] `GET` method, `api/products` endpoint - displays empty product lists (before creating any)
    2. [x] `POST` method, `api/products` endpoint - creates a new product (showing `201` status code)
    3. [x] `GET` method, `api/products` endpoint - displays product lists (after creating)
    4. [x] `GET` method, `api/products/{id}` endpoint - displays a single product
    5. [x] `PUT` method, `api/products/{id}` endpoint - updates an existing product
    6. [x] `DELETE` method, `api/products/{id}` endpoint - deletes a product
    
## Submission Checklist

Before submitting, ensure:
-  [x] Code pushed to GitHub
-  [x] README.md with setup instructions
-  [x] `.env.example` file included
-  [x] Migrations ran without errors
-  [x] All 5 endpoints worked
-  [x] All screenshots provided in `/screenshots` folder

## Submission Format

1. [ ] GitHub repo created, repo is set to public
2. [ ] Pushed all code to GitHub
3. [x] Add screenshot to `/screenshots` folder
4. [ ] Submitted the repository to [Sir Uzzair](mailto:uzzair@invokeisdata.com)