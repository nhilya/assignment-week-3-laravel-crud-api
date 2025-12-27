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

## Part E (30 marks)

### E1: Git workflow (5 marks)

- [x] Create a new branch named `authz-spatie`
- [x] Push the branch to GitHub
- [x] Make sure the main branch is up to date, clean and pushed to GitHub
- [x] All work for the [Assignment E - Authentication & Authorization (Laravel + Spatie Permissions)](<../assignment-instruction/Assignment%20Continuation_%20Part%20E%20—%20Authentication%20%26%20Authorization%20(Laravel%20%2B%20Spatie%20Permissions).pdf>) is done in the `authz-spatie` branch
- [ ] Screenshot of git branch showing the new branch name + latest commit

### E2: Authentication (10 marks)

- [ ] Implement token-based authentication for API users.
    - [ ] Add API endpoints:
        - [ ] `POST /api/auth/register`
        - [ ] `POST /api/auth/login`
        - [ ] `POST /api/auth/logout` (requires authentication)
        - [ ] `GET /api/auth/me` (requires authentication)

    - [ ] All responses must be JSON with correct HTTP status codes:
        - [ ] `200` for successful registration
        - [ ] `201` for success
        - [ ] `401` for unauthenticated requests
        - [ ] `422` for validation errors

    - [ ] Using the suggested approach: Laravel Sanctum for token auth (personal access tokens).
    - [ ] Auth controller(s) (e.g. `app/Http/Controllers/Auth/*`)
    - [ ] Updated routes (e.g. `routes/api.php`)
    - [ ] Screenshot of successful auth flow tests in Bruno (see E4)

### E3: Authorization with Spatie Permissions (15 marks)

1. Install & setup

    - [ ] Use `spatie/laravel-permission` to enforce permissions on product endpoints.
        - [ ] Install spatie/laravel-permission
        - [ ] Publish config/migrations
        - [ ] Run migrations
        - [ ] Ensure User model uses `HasRoles` trait

2. Define roles & permissions

    - [ ] Create at least these permissions:
        - [ ] `products-view`
        - [ ] `products-create`
        - [ ] `products-update`
        - [ ] `products-delete`

    - [ ] Create at least these roles (you may add more):
        - [ ] admin: all product permissions
        - [ ] staff: view, create, update
        - [ ] viewer: view only

3. Seed roles & permissions

    - [ ] Create a seeder (recommended) to generate roles & permissions.
    - [ ] Assign a role to a user (either via seeder, tinker, or a protected admin route).

4. Protect Product routes

    - [ ] Update /api/products routes so that:
        - [ ] All product endpoints require authentication.
        - [ ] Permissions are enforced:
            - [ ] `GET` `/api/products` and `GET` `/api/products/{id}` → `products-view`
            - [ ] `POST` `/api/products` → `products-create`
            - [ ] `PUT` `/api/products/{id}` → `products-update`
            - [ ] `DELETE` `/api/products/{id}` → `products-delete`

    - [ ] Expected behavior
        - [ ] Unauthenticated request → `401 Unauthorized`
        - [ ] Authenticated but missing permission → `403 Forbidden`
        - [ ] Authorized → normal success status codes (`200`/`201` etc)

    - [ ] Seeder file(s) (`roles/permissions`)
    - [ ] Proof in code: `middleware/policies/gates` (your choice), but must use Spatie permissions.
    - [ ] Screenshot of successful `php artisan migrate` and `php artisan db:seed` output.

### E4: API Testing with Bruno (required for Part E)

-   [ ] Provide screenshots (request + response) for these:
    - [ ] Register a user → `201`
    - [ ] Login and obtain token → `200`
    - [ ] Access `GET` `/api/auth/me` without token → `401`
    - [ ] Access `GET` `/api/auth/me` with token → `200`
    - [ ] Access `POST` `/api/products` as viewer → `403`
    - [ ] Access `GET` `/api/products` as viewer → `200`
    - [ ] Access `POST` `/api/products` as admin (or staff) → `201`
    - [ ] Logout → `200`

- [ ] Put all screenshots in `screenshots/` folder (continue the same style from Part D).

- [ ] Continue using the same repo rules (public GitHub repo, `README`, `.env.example`, screenshots folder).
    - [ ] Make sure:
        - [ ] Code is pushed (including the new branch)
        - [ ] `README` includes how to run migrations + seed roles/permissions
        - [ ] Auth + permission enforcement works as specified
        - [ ] Bruno screenshots for [Part E](<../assignment-instructionAssignment%20Continuation_%20Part%20E%20—%20Authentication%20%26%20Authorization%20(Laravel%20%2B%20Spatie%20Permissions).pdf>) are complete
