# Bug Fixes and Optimization in TaskController.php

## Issues Fixed:

### 1. **Incorrect Namespace and Imports**
- **Fixed:** Changed `namespace App\Https\Controllers;` to `namespace App\Http\Controllers;`.
- **Fixed:** Changed `use Illuminate\Https\Request;` to `use Illuminate\Http\Request;`.
- **Fixed:** Added `use Illuminate\Support\Facades\DB;` for database operations.
- **Fixed:** Added `use Illuminate\Support\Facades\Validator;` for input validation.

### 2. **Lack of Input Validation**
- **Fixed:** Added validation in `store()` and `update()` methods to prevent invalid data from being saved.
- **Used:** `Validator::make()` to enforce required fields and valid data formats.

### 3. **No Error Handling in `update()` Method**
- **Fixed:** Checked if the task exists before updating it to avoid calling properties on `null`.
- **Fixed:** Returned a `404 Not Found` response if the task does not exist.

### 4. **Unsafe Direct Data Assignment**
- **Fixed:** Used mass assignment via `$task->update($request->all());` instead of assigning each attribute manually.

### 5. **Added HTTP Response Codes**
- **Fixed:** Used `201 Created` for successful task creation.
- **Fixed:** Used `422 Unprocessable Entity` for validation errors.
- **Fixed:** Used `404 Not Found` for missing tasks.

### 6. **Better Error Handling in `destroy()` Method**
- **Fixed:** Checked if the task exists before attempting to delete.
- **Fixed:** Returned a proper `404 Not Found` response when the task ID does not exist.

## Optimizations:
- **Simplified Code:** Used `Task::create()` for inserting new tasks.
- **Improved Readability:** Added spacing and structured validation rules for clarity.
- **Enhanced Security:** Prevented mass assignment vulnerabilities by ensuring validation before updating models.