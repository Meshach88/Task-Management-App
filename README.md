# Task Management App

## Overview
The Task Management App allows users to manage their tasks effectively by enabling features like creating, updating, and deleting tasks. The app uses Laravel for the backend and is integrated with an authentication system, so users can sign up, log in, and have personalized task lists.

## Features
- **Task Creation**: Users can create tasks with a title, description, status (pending/completed), and due date.
- **Task Editing and Deletion**: Tasks can be updated or deleted as needed.
- **User Authentication**: Users must log in to access their personal tasks.
- **Validation**: Includes validation to ensure task titles are required and due dates must be in the future.

## Approach
This application follows the MVC (Model-View-Controller) architecture pattern provided by Laravel. Here's a brief overview of how each part of the app works:

### **Models**
- **Task Model**: Handles all task-related database interactions. Includes validation for the required fields (title and due date). 

### **Controllers**
- **TaskController**: Manages all task-related operations such as creating, updating, and deleting tasks. It also handles the filtering and listing of tasks.

### **Views**
The views are created using Blade templates, which provide dynamic rendering of task and comment data.
- **Task Views**: Includes a list of tasks and a detailed view of each task where comments can be added.
- **Authentication Views**: Handles user sign-up, login, and registration.

### **Database**
- **Tasks Table**: Stores task details such as title, description, status, and due date.