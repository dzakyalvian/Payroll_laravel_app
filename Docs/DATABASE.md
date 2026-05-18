# DATABASE STRUCTURE

## Core Modules

- Authentication
- Employee Management
- Department Management
- Position Management
- Attendance
- Payroll
- Payroll Details
- Leave Management
- Role & Permission

---

# USERS

Authentication table.

Fields:

- id
- name
- email
- password
- role_id
- created_at
- updated_at

Relationships:

- belongsTo Role
- hasOne Employee

---

# ROLES

Stores application roles.

Examples:

- Admin
- HR
- Employee

Relationships:

- hasMany Users

---

# EMPLOYEES

Stores employee data.

Fields:

- id
- employee_code
- full_name
- gender
- phone
- address
- department_id
- position_id
- hire_date
- employment_status
- basic_salary

Relationships:

- belongsTo Department
- belongsTo Position
- hasMany Attendances
- hasMany Payrolls
- hasMany Leaves

---

# DEPARTMENTS

Stores department data.

Examples:

- HR
- Finance
- IT

Relationships:

- hasMany Employees

---

# POSITIONS

Stores job positions.

Examples:

- Manager
- Staff
- Supervisor

Relationships:

- hasMany Employees

---

# ATTENDANCES

Stores attendance records.

Fields:

- employee_id
- attendance_date
- check_in
- check_out
- attendance_status
- late_minutes

Relationships:

- belongsTo Employee

---

# PAYROLLS

Stores monthly payroll data.

Fields:

- employee_id
- payroll_period
- total_salary
- total_deduction
- total_bonus
- net_salary
- payroll_status

Relationships:

- belongsTo Employee
- hasMany PayrollDetails

---

# PAYROLL_DETAILS

Stores payroll calculation details.

Examples:

- basic salary
- overtime
- deductions
- allowances

Relationships:

- belongsTo Payroll

---

# LEAVES

Stores leave requests.

Fields:

- employee_id
- leave_type
- start_date
- end_date
- approval_status

Relationships:

- belongsTo Employee

---

# BUSINESS RULES

- One payroll per employee per period
- Attendance affects payroll calculation
- Payroll must support deductions and bonuses
- Salary history must be preserved
- Deleted employees should not remove payroll history

---

# DATABASE RULES

- Use foreign keys
- Use indexes for search-heavy tables
- Use timestamps
- Use soft deletes when needed
- Avoid duplicated payroll records