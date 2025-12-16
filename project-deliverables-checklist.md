# Project Planning & Deliverables

## 🎯 Project Goal
Refer to: [Assignment: Backend Development with Laravel](assignment-instruction/Backend%20Development%20with%20Laravel%20Assignment.pdf)

## 📅 Timeline
Start: 17-12-2025
Deadline: 21-12-2025, 11:59 PM

## Part A: Project Setup (25 marks)

- [ ] Create a system that can manage product inventory, with backend API that allow:
    - [ ] View all products
    - [ ] View a single product
    - [ ] Create a new product
    - [ ] Update an existing product
    - [ ] Delete a product

- [ ] Screenshot of .env database configurations
- [ ] Screenshot of successful `php artisan migrate` output

## Part B: Model & Migrations (25 marks)

- [ ] Create a model named `Product` with the following attributes:
    - [ ] `id` (primary key)
    - [ ] `name` (string, 255)
    - [ ] `description` (text, nullable)
    - [ ] `price` (decimal, 10, 2)
    - [ ] `stock` (int, default 0)
    - [ ] `created_at` (timestamp)
    - [ ] `updated_at` (timestamp)

- [ ] `Product.php` Model file in `app/Models` folder
- [ ] Migration file in `database/migrations` folder
- [ ] Screenshot showing migration ran successfully

## Part C: Controller & Routes (25 marks)

- [ ] Create a `ProductController.php` with these endpoints:
    - [ ] `GET` method, `api/products` endpoint, `index` action that list all products
    - [ ] `GET` method, `api/products/{id}` endpoint, `show` action that show a single product
    - [ ] `POST` method, `api/products` endpoint, `store` action that create a new product
    - [ ] `PUT` method, `api/products/{id}` endpoint, `update` action that update an existing product
    - [ ] `DELETE` method, `api/products/{id}` endpoint, `destroy` action that delete a product

- [ ] Requirements:
    - [ ] All responses return JSON format
    - [ ] Use correct HTTP status codes
        - [ ] `200` for success
        - [ ] `201` for created
        - [ ] `404` for not found
        - [ ] `422` for validation errors
        - [ ] `500` for server error
    - [ ] Validate input for `store` and `update` actions
    - [ ] Handle missing products with `404` response

- [ ] `app/Http/Controllers/ProductController.php`
- [ ] `routes/api.php`

## Part D: API Testing with Bruno API Client (25 marks)

- [ ] Test all endpoints using Bruno and provide clear screenshots showing request and response of the following:
    1. [ ] `GET` method, `api/products` endpoint - displays empty product lists (before creating any)
    2. [ ] `POST` method, `api/products` endpoint - creates a new product (showing `201` status code)
    3. [ ] `GET` method, `api/products` endpoint - displays product lists (after creating)
    4. [ ] `GET` method, `api/products/{id}` endpoint - displays a single product
    5. [ ] `PUT` method, `api/products/{id}` endpoint - updates an existing product
    6. [ ] `DELETE` method, `api/products/{id}` endpoint - deletes a product
    
## Submission Checklist

Before submitting, ensure:
-  [ ] Code pushed to GitHub
-  [ ] README.md with setup instructions
-  [ ] `.env.example` file included
-  [ ] Migrations ran without errors
-  [ ] All 5 endpoints worked
-  [ ] All screenshots provided in `/screenshots` folder

## Submission Format

1. [ ] GitHub repo created, repo is set to public
2. [ ] Pushed all code to GitHub
3. [ ] Add screenshot to `/screenshots` folder
4. [ ] Submitted the repository to [Sir Uzzair](mailto:uzzair@invokeisdata.com)