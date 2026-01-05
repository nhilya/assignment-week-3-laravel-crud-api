# Project Planning & Deliverables

## 🎯 Project Goal
Refer to: [Assignment: Backend Development with Laravel](assignment-instruction/Backend%20Development%20with%20Laravel%20Assignment.pdf)

## 📅 Timeline
Start: 17-12-2025\
Deadline: 21-12-2025, 11:59 PM

## Part A: Project Setup (25 marks)

- [x] Create a system that can manage product inventory, with backend API that allow:
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

- [x] Code pushed to GitHub
- [x] README.md with setup instructions
- [x] `.env.example` file included
- [x] Migrations ran without errors
- [x] All 5 endpoints worked
- [x] All screenshots provided in `/screenshots` folder

## Submission Format

1. [x] GitHub repo created, repo is set to public
2. [x] Pushed all code to GitHub
3. [x] Add screenshot to `/screenshots` folder
4. [x] Submitted the repository to [Sir Uzzair](mailto:uzzair@invokeisdata.com)

---

# Assignment Continuation: Part E — Authentication & Authorization (Laravel + Spatie Permissions)

## Project Goal
Refer to: [Assignment Continuation: Part E — Authentication & Authorization (Laravel + Spatie Permissions)](<../assignment-instruction/Assignment%20Continuation_%20Part%20E%20—%20Authentication%20%26%20Authorization%20(Laravel%20%2B%20Spatie%20Permissions).pdf>)

## Part E (30 marks)

### E1: Git workflow (5 marks)

- [x] Create a new branch named `authz-spatie`
- [x] Push the branch to GitHub
- [x] Make sure the main branch is up to date, clean and pushed to GitHub
- [x] All work for the [Assignment Continuation: Part E — Authentication & Authorization (Laravel + Spatie Permissions)](<../assignment-instruction/Assignment%20Continuation_%20Part%20E%20—%20Authentication%20%26%20Authorization%20(Laravel%20%2B%20Spatie%20Permissions).pdf>) is done in the `authz-spatie` branch
- [x] Screenshot of git branch showing the new branch name + latest commit

### E2: Authentication (10 marks)

- [x] Implement token-based authentication for API users.
    - [x] Add API endpoints:
        - [x] `POST` `/api/auth/register`
        - [x] `POST` `/api/auth/login`
        - [x] `POST` `/api/auth/logout` (requires authentication)
        - [x] `GET` `/api/auth/me` (requires authentication)

    - [x] All responses must be JSON with correct HTTP status codes:
        - [x] `200` for successful registration
        - [x] `201` for success
        - [x] `401` for unauthenticated requests
        - [x] `422` for validation errors

    - [x] Using the suggested approach: Laravel Sanctum for token auth (personal access tokens).
    - [x] Auth controller(s) (e.g. `app/Http/Controllers/Auth/*`)
    - [x] Updated routes (e.g. `routes/api.php`)
    - [x] Screenshot of successful auth flow tests in Bruno (see [E4](#e4-api-testing-with-bruno-required-for-part-e))

### E3: Authorization with Spatie Permissions (15 marks)

1. Install & setup

    - [x] Use `spatie/laravel-permission` to enforce permissions on product endpoints.
        - [x] Install spatie/laravel-permission
        - [x] Publish config/migrations
        - [x] Run migrations
        - [x] Ensure User model uses `HasRoles` trait

2. Define roles & permissions

    - [x] Create at least these permissions:
        - [x] `products-view`
        - [x] `products-create`
        - [x] `products-update`
        - [x] `products-delete`

    - [x] Create at least these roles (you may add more):
        - [x] admin: all product permissions
        - [x] staff: view, create, update
        - [x] viewer: view only

3. Seed roles & permissions

    - [x] Create a seeder (recommended) to generate roles & permissions.
    - [x] Assign a role to a user (either via seeder, tinker, or a protected admin route).

4. Protect Product routes

    - [x] Update /api/products routes so that:
        - [x] All product endpoints require authentication.
        - [x] Permissions are enforced:
            - [x] `GET` `/api/products` and `GET` `/api/products/{id}` → `products-view`
            - [x] `POST` `/api/products` → `products-create`
            - [x] `PUT` `/api/products/{id}` → `products-update`
            - [x] `DELETE` `/api/products/{id}` → `products-delete`

    - [x] Expected behavior
        - [x] Unauthenticated request → `401 Unauthorized`
        - [x] Authenticated but missing permission → `403 Forbidden`
        - [x] Authorized → normal success status codes (`200`/`201` etc)

    - [x] Seeder file(s) (`roles/permissions`)
    - [x] Proof in code: `middleware/policies/gates` (your choice), but must use Spatie permissions.
    - [x] Screenshot of successful `php artisan migrate` and `php artisan db:seed` output.

### E4: API Testing with Bruno (required for Part E)

- [x] Provide screenshots (request + response) for these:
    - [x] Register a user → `201`
    - [x] Login and obtain token → `200`
    - [x] Access `GET` `/api/auth/me` without token → `401`
    - [x] Access `GET` `/api/auth/me` with token → `200`
    - [x] Access `POST` `/api/products` as viewer → `403`
    - [x] Access `GET` `/api/products` as viewer → `200`
    - [x] Access `POST` `/api/products` as admin (or staff) → `201`
    - [x] Logout → `200`

- [x] Put all screenshots in `screenshots/` folder (continue the same style from Part D).

- [x] Continue using the same repo rules (public GitHub repo, `README`, `.env.example`, screenshots folder).
    - [x] Make sure:
        - [x] Code is pushed (including the new branch)
        - [x] `README` includes how to run migrations + seed roles/permissions
        - [x] Auth + permission enforcement works as specified
        - [x] Bruno screenshots for [Part E](<../assignment-instruction/Assignment%20Continuation_%20Part%20E%20—%20Authentication%20%26%20Authorization%20(Laravel%20%2B%20Spatie%20Permissions).pdf>) are complete
