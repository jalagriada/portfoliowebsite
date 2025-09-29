# John Lagriada — Portfolio Website

Short note: This is the portfolio website used for my midterm in Web Systems.

## Project Overview
A personal portfolio website showcasing skills, experience, and contact details for John Lagriada. The site includes a typed hero heading, JSON-styled info blocks, responsive navigation (desktop & mobile), skills and experience sections, a contact form (posts to `contact.php`), and a modal for user feedback.

## Features
- Responsive layout for desktop and mobile
- Smooth typed hero text animation
- Accessible navigation with keyboard support and focus-visible underline
- Contact form with client-side validation and AJAX POST
- Modal feedback UI for form submission and CV actions
- Themed "JSON" blocks for visual presentation

## Tech Stack
- HTML5, CSS (inline styles in `index.php`)
- Vanilla JavaScript (no frameworks)
- PHP (for form handling: `contact.php` expected)
- Font Awesome (CDN) for icons

## Important Files
- `index.php` — Main page with markup, styles, and client-side scripts.
- `contact.php` — (not included) server-side endpoint to receive form POSTs; recommended to return JSON.
- `README.md` — This file.

## How to run locally (Windows / XAMPP)
1. Install XAMPP and start Apache.
2. Place the project folder in your XAMPP `htdocs` directory (e.g. `C:\xampp\htdocs\port`).
3. Open a browser and visit: http://localhost/port/
4. If you implement `contact.php`, place it in the same folder and make it return JSON responses for the AJAX form.

## Notes for contact.php
- Expect a POST with these fields: `name`, `email`, `subject`, `message`.
- Recommended JSON responses:
  - Success: `{ "success": true }`
  - Validation errors: `{ "success": false, "errors": { "email": "Invalid email" } }`
- The front-end sends `Accept: application/json` and displays messages in the modal.

## Customization
- Edit text strings in `index.php` (hero typed texts are defined in the JS array).
- Change colors by updating CSS variables near the top of the `<style>` block in `index.php`.
- Replace icon links with your own social profiles (Contact section).
- To add a downloadable CV, add a static `cv.pdf` or an endpoint and update the CV button link.

## Accessibility & UX
- Navigation supports keyboard activation and keyboard-visible underline (focus-visible).
- Modal requires explicit OK click to dismiss (intentional design).
- Mobile hamburger toggles and closes on navigation click or outside clicks.

## Academic note
Prepared as a midterm submission for Web Systems. If reused or modified, please update this README accordingly.

## Contact
Email: johnlagriada@gmail.com


