# PROJECT CONTEXT

## Project Name

Payroll Management System

---

## Tech Stack

- Laravel 12
- Livewire 3
- TailwindCSS
- Alpine.js
- MySQL
- Vite

---

## Architecture

- Laravel Fullstack Architecture
- Livewire Driven UI
- Service Layer Pattern
- Repository Pattern
- Reusable Blade Components
- Modular Feature Structure

---

## Main Goals

Build a modern payroll and HR management system with:

- clean architecture
- scalable structure
- maintainable codebase
- professional UI/UX
- enterprise dashboard feel

---

## Coding Standards

- Follow SOLID principles
- Keep methods small and reusable
- Use meaningful naming
- Avoid duplicated logic
- Use clean folder structure
- Prefer composition over duplication

---

## Backend Rules

- Avoid fat controllers
- Avoid business logic inside Livewire components
- Use Service classes for business logic
- Use Repository pattern for complex queries
- Use Form Request validation
- Use database transactions for payroll processing
- Use eager loading
- Use pagination for large tables

---

## Livewire Rules

- Keep components small
- One responsibility per component
- Avoid large render methods
- Use computed properties when needed
- Use wire:model.defer when possible
- Avoid unnecessary re-rendering

---

## Database Rules

- Use foreign key constraints
- Use soft deletes where necessary
- Use UUID for public references if needed
- Prevent duplicated payroll records
- Normalize payroll-related data

---

## Security Rules

- Use Laravel Policies
- Validate all user input
- Prevent mass assignment vulnerabilities
- Protect sensitive payroll actions
- Use CSRF protection
- Never expose sensitive employee salary data

---

## Performance Rules

- Avoid N+1 queries
- Use eager loading
- Paginate heavy data
- Cache expensive queries if needed
- Optimize dashboard queries

---

## UI Rules

- Follow DESIGN.md
- Use reusable Blade UI components
- Do not use random Tailwind classes
- Use semantic color system
- Keep spacing consistent
- Keep layout clean and minimal

---

## Folder Structure

app/
 ├── Actions
 ├── Services
 ├── Repositories
 ├── Livewire
 ├── Models
 ├── Policies

resources/
 ├── views
 │    ├── components
 │    │    └── ui
 │    ├── livewire
 │    └── layouts

docs/
 ├── AI_CONTEXT.md
 ├── DESIGN.md
 ├── DATABASE.md
 ├── FEATURE_ROADMAP.md

---

## AI Instructions

Before generating any code:

1. Read AI_CONTEXT.md
2. Read DESIGN.md
3. Follow DATABASE.md
4. Follow FEATURE_ROADMAP.md

## Workflow
STEP 1
Write rules

STEP 2
Lock architecture

STEP 3
Lock design system

STEP 4
Lock database structure

STEP 5
Build reusable components

STEP 6
Generate features slowly

Never generate inconsistent UI or architecture.
Always prioritize maintainability and scalability.