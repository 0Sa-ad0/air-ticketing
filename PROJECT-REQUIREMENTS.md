# Software Requirements Specification (SRS)

**For:** Air Ticketing Platform  
**Version:** 1.0  
**Date:** 17 Oct 2025  
**Prepared for:** PHP Laravel Developer Team

---

## 1. Introduction

### 1.1 Purpose
The purpose of this SRS is to define the functional and non-functional requirements of a simple Air Ticketing Platform. The system will enable the aviation office (Admin) to manage flight schedules and applicant selection, while allowing users (Passengers) to apply for flights, upload required documents, and complete payments online.

### 1.2 Intended Audience
- Admin Users (Aviation Office)
- Passenger Users (Public users through mobile browsers)
- Developers (PHP Laravel team)
- QA/Testers

### 1.3 Scope
The system will have two main interfaces:

1. **Admin Panel (Web)** – for aviation staff to manage flight schedules and passenger selection.  
2. **User Frontend (Mobile-friendly Web)** – for passengers to check flight availability, apply, get notifications, upload documents, and make payments.

> The platform does **not** include complex airline booking engines — it's a simple application-ticketing workflow for scheduled flights managed by the Admin.

---

## 2. Overall Description

### 2.1 Product Perspective
The platform is a standalone web application, developed using:
- **Backend:** PHP Laravel
- **Frontend:** HTML/CSS/Bootstrap or Laravel Blade
- **Database:** MySQL

### 2.2 User Classes & Characteristics

| User Type          | Role                            | Access                                      |
|--------------------|----------------------------------|---------------------------------------------|
| Admin              | Aviation office personnel       | Full access via secure login                |
| User (Applicant)   | Passengers using mobile browsers| Public access; registration required        |

### 2.3 Operating Environment
- **Frontend:** Mobile-friendly browser interface (Responsive)
- **Backend:** Laravel 10+, PHP 8+, MySQL 8+
- **Server:** Linux / Shared Hosting / VPS (to be specified)

---

## 3. Functional Requirements

### 3.1 Admin Panel Functions

| ID  | Function                     | Description                                                                 |
|-----|------------------------------|-----------------------------------------------------------------------------|
| A1  | Admin Login                  | Secure login using email/password                                           |
| A2  | Flight Schedule Management   | Create, view, edit, delete flight schedules (From, To, Date, Time, Capacity, Status) |
| A3  | Application Window           | Open/Close flight application for each schedule                             |
| A4  | Shortlist Applicants         | View all applicants per flight; mark shortlisted applicants                 |
| A5  | Publish Shortlist            | Publish the list so users get notified                                      |
| A6  | View Documents               | View uploaded PDF/JPEG docs of shortlisted users                            |
| A7  | Finalize List                | Publish final passenger list                                                |
| A8  | Payment Confirmation         | Check payment status                                                        |
| A9  | Export Data                  | Export passenger list (Excel/PDF)                                           |

### 3.2 User Functions

| ID  | Function                     | Description                                                                 |
|-----|------------------------------|-----------------------------------------------------------------------------|
| U1  | View Flights                 | Check available flights with From–To, Date, Status                          |
| U2  | User Registration/Login      | Basic sign-up/sign-in                                                       |
| U3  | Apply for Flight             | Fill simple application form for a flight                                   |
| U4  | View Shortlist Notification  | See if the user has been shortlisted                                        |
| U5  | Upload Documents             | Upload PDF/JPEG (e.g., ID, passport, forms) if shortlisted                  |
| U6  | View Final Passenger List    | Check published final list                                                  |
| U7  | Payment                      | Make online/offline payment (Laravel Cashier or simple manual confirmation) |
| U8  | View Application Status      | Dashboard showing current status of each applied flight                     |

---

## 4. Data Requirements

### 4.1 Database Tables (Minimum)

- **`users`**: `id`, `name`, `email`, `password`, `role` (admin/user), `created_at`  
- **`flights`**: `id`, `from`, `to`, `departure_date`, `departure_time`, `capacity`, `status` (open/closed/published), `created_by`  
- **`applications`**: `id`, `user_id`, `flight_id`, `status` (pending/shortlisted/final/paid), `created_at`  
- **`documents`**: `id`, `application_id`, `file_path`, `file_type`, `uploaded_at`  
- **`payments`**: `id`, `application_id`, `amount`, `status` (pending/paid/failed), `transaction_ref`, `created_at`

---

## 5. Non-Functional Requirements

| Type        | Requirement                                      |
|-------------|--------------------------------------------------|
| Performance | System should support 100+ concurrent users       |
| Security    | Admin panel protected by authentication & authorization |
| Usability   | Mobile-first responsive design                   |
| Backup      | Daily DB backup                                  |
| Deployment  | Should run on shared hosting / VPS with Laravel  |

---

## 6. User Interface Requirements

### 6.1 Admin Panel
- Simple dashboard showing total flights, total applicants, pending payments
- CRUD pages for flight schedule
- Applicant listing with filters (by flight, status)
- Publish buttons for shortlist/final list

### 6.2 User Interface (Mobile Web)
- **Home Page** → List of flights  
- **Apply Page** → Simple form with “Apply Now” button  
- **Notifications Page** → Shows shortlist/final list updates  
- **Upload Documents Page** → File upload input (PDF, JPEG)  
- **Payment Page** → Pay Now (gateway/manual)  
- **My Applications Page** → Shows application status

---

## 7. Project Timeline (3 Weeks)

| Week   | Task                                                                 |
|--------|----------------------------------------------------------------------|
| Week 1 | Project setup, DB schema, Admin authentication, Flight schedule CRUD |
| Week 2 | User registration, application submission, shortlist & finalization flows |
| Week 3 | Document upload, payment integration, UI polishing, testing, deployment |

---

## 8. Future Enhancements (Optional)
- Multi-admin roles  
- Seat selection  
- SMS/email notifications  
- Integration with actual payment gateways  
- Reporting dashboard