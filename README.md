# The Journel - Simple Blog Application (Laravel)

## Project Overview
This is a simple blog application built with Laravel and Blade.

Visitors can read blog posts by category, view recent posts on the home page, and read full blog details. An Admin Panel allows admins to manage categories and blog posts.

---

## Technologies Used
- Laravel 11 / 12
- Blade Templates
- Bootstrap / Tailwind / CSS
- MySQL (or any SQL database)
- Eloquent ORM
- Custom Authentication (No Breeze / Jetstream)

---

## Public Features

### Home Page (/)
- Hero section with title and subtitle
- List of all categories
- Recent blog posts (latest 5–10)
- Each post shows:
  - Title
  - Category
  - Short excerpt
  - Published date
  - Read More button

---

### Blog Details Page (/blog/{slug})
- Blog title
- Category name (clickable)
- Author name
- Published date
- Full blog content
- Back to Home option

---

### Category-wise Blog Page (/category/{slug})
- Category name
- All posts under that category
- Message shown if no posts exist

---

## Admin Panel
- Admin routes under /admin
- Protected by authentication and admin middleware

### Admin Dashboard (/admin/dashboard)
- Total categories count
- Total posts count
- Links to:
  - Manage Categories
  - Manage Posts
  - Logout

---

## Authentication
- Custom Login
- Custom Register
- Logout
- Middleware protected admin routes

---

## Database Models
- User
- Category
- Post

### Relationships
- Category has many posts
- Post belongs to category
- Post belongs to user (author)

---

Simple, clean, and beginner-friendly Laravel blog project.
