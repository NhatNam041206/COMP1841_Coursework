# Coursework Specification Document: Student Forum System (COMP1841)

---

## 1. Project Background & Case Study

The objective is to design and implement an individual, functional, data-driven prototype web application where students can post questions to receive peer assistance with their coursework, mimicking a simplified version of Stack Overflow.

The technical stack is strictly restricted to **HTML5, PHP PDO, and MySQL**. Running the system using the MySQLi extension is completely prohibited and results in a severe grade penalty. The platform operates locally within an **XAMPP environment** or on the institution's designated student webserver.

---

## 2. System Architecture & Directory Structure

The workspace layout safely separates modern template views from logic entry-points, providing a straightforward transition from initial procedural scripts to a full Model-View-Controller (MVC) architectural design for advanced feature points.

```text
student_forum/
│
├── config/
│   └── database.php             <-- PHP PDO connection file (using safe DSN)
│
├── controllers/                  <-- Class-based handlers (Advanced MVC phase)
│   ├── PostController.php
│   └── UserController.php
│
├── database/
│   └── student_forum.sql        <-- Database configuration initialization & seed rows
│
├── models/                      <-- Data access layers isolation (Advanced MVC phase)
│   ├── PostModel.php
│   └── ModuleModel.php
│
├── public/                      <-- Entry-point directory
│   ├── css/
│   │   └── style.css            <-- Global layout styling rules
│   ├── uploads/
│   │   ├── images/              <-- Screenshot files (Required for assessment marks)
│   │   └── documents/           <-- Uploaded student coursework context materials
│   │
│   ├── index.php                <-- Application front controller / router hub
│   ├── posts.php                <-- Browse posts view-logic coordinator
│   ├── addpost.php              <-- Question formulation controller
│   ├── editpost.php             <-- Question editing controller
│   ├── deletepost.php           <-- Post removal action processor
│   └── contact.php              <-- Administrator communication handler
│
└── templates/                    <-- HTML Presentation components
    ├── layout.html.php          <-- Structural skeleton (Header, Nav, Footer)
    ├── posts.html.php           <-- List visualization layout
    ├── addpost.html.php         <-- Creation input form with dynamic drop-downs
    ├── editpost.html.php         <-- Modification input fields
    └── contact.html.php         <-- Admin contact web interface fields

```

---

## 3. Database Specification & Sample Data

The system relies on a relational database configuration enforcing relational constraints and referential integrity via explicit foreign keys mapped with cascading delete actions.

### Entity Relationship Mapping

* 
**User to Post ($1 \rightarrow *)$**: One user can author multiple forum questions. Each question is bound to a single user.


* 
**Module to Post ($1 \rightarrow *)$**: One university course module accumulates many associated questions. Each individual post targets a singular parent module taxonomy field.

---

## 3. Operational Requirements Tracker

Baseline Scope (40% Weighting) 

* 
**Post Processing Interface**: Public web page cleanly serving questions/posts queried straight out of the transactional engine.


* 
**Full Post CRUD Handling**: Working routines implementing validation controls for the additions, updates, and structural removal of post entries.


* 
**Media Attachment Display**: Capacity to parse, file-upload, rename, and structurally view individual image screenshots paired to specific forum queries.


* 
**Relational Entity Integration Forms**: Add, edit, and delete capability for users and modules. Forms must select active authors and system modules via dynamic HTML drop-down selection controls linked directly to database identifiers.


* 
**Administrative Communications Web Form**: Working text-input configuration enabling students to route technical query emails to system support admins.



Advanced Extensions Scope (30% Weighting) 

* 
**Access Control Shielding**: Deployment of a secure login/signup layer relying on encrypted values generated using the native standard algorithm (`password_hash`).


* 
**Contextual User Session Tracking**: Reading authorization payloads out of a continuous session context to bypass standard user selectors during question creation.


* 
**Administration Control Panel View**: Restricted view zone protecting configuration capabilities against anonymous browser entities.


* 
**MVC Codebase Partitioning**: Refactoring procedural templates and queries into explicit Model classes and Controller layers.


* 
**Validation Protocols**: Server-side validation processes paired with client-side user experience helpers.
