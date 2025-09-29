# John Lagriada — Portfolio Website

Maikling note: Ito ang portfolio website na ginamit ko para sa midterm sa Web Systems.

## Project Overview
This is a personal portfolio website showcasing skills, experience, and contact information for John Lagriada. The site includes a typed hero heading, JSON-styled info blocks, responsive navigation (desktop + mobile), skills and experience sections, contact form (posts to `contact.php`), and a modal for user feedback.

## Features
- Responsive layout (desktop and mobile)
- Smooth typed hero text animation
- Accessible navigation with keyboard support and focus styles
- Contact form with client-side validation and AJAX POST
- Modal feedback UI for form and CV actions
- Styled "JSON" blocks for thematic presentation

## Tech Stack
- HTML5, CSS (inline in `index.php`)
- Vanilla JavaScript (no frameworks)
- PHP (for form handling: `contact.php` expected)
- Font Awesome for icons (CDN)

## Files of interest
- `index.php` — Main page with markup, styles and client-side scripts.
- `contact.php` — (not included here) server-side script to receive form POSTs; recommended to return JSON.
- `README.md` — This file.

## How to run locally (Windows / XAMPP)
1. Install XAMPP and start Apache.
2. Place the project folder in your XAMPP `htdocs` directory (e.g. `c:\xampp\htdocs\port`).
3. Open a browser and visit: `http://localhost/port/`
4. If you implement `contact.php`, ensure it is in the same folder and returns JSON responses for the AJAX form.

## Notes for `contact.php`
- Expect a POST with `name`, `email`, `subject`, `message`.
- Return JSON like:
  - Success: `{ "success": true }`
  - Validation errors: `{ "success": false, "errors": { "email": "Invalid email" } }`
- The front-end sends `Accept: application/json` and displays messages in the modal.

## Customization
- Change the text strings in `index.php` (hero typed texts are in the JS array).
- Modify colors in the top of the `<style>` where CSS variables are defined.
- Replace icons/links with your social profiles (in the Contact section).
- To add a downloadable CV, implement an endpoint or static `cv.pdf` and update the CV button link.

## Accessibility & UX
- Navigation supports keyboard activation and focus-visible underline.
- Modal requires explicit OK click to dismiss (per project design).
- Mobile hamburger toggles and closes on navigation click or outside clicks.

## Academic note
This project was prepared as a midterm submission for Web Systems. If reused or modified, please update this README accordingly.

## Contact
Email: johnlagriada@gmail.com

---
Good luck with your midterm!
