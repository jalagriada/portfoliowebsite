# John Lagriada — Portfolio Website (Web Systems Midterm)

A concise, instructor-friendly portfolio website used as a midterm submission for Web Systems. The site demonstrates a responsive personal portfolio layout, an animated typed hero, JSON-styled info blocks, accessible navigation, and a contact form with AJAX.

## Quick facts
- **Author**: John Lagriada
- **Year**: 2025
- **Stack**: HTML, CSS, Vanilla JS, PHP (contact endpoint expected)
- **Project folder**: c:\xampp\htdocs\port

## How to run (Windows / XAMPP)
1. Install XAMPP and start Apache.
2. Place the project folder in XAMPP `htdocs` (e.g. C:\xampp\htdocs\port).
3. In a browser visit: http://localhost/port/
4. Optional: add `contact.php` in the same directory to enable form submission; the front-end sends a POST and expects JSON.

## Grading checklist (quick reference for instructor)
- [x] Responsive layout (desktop & mobile) — see CSS media queries in index.php
- [x] Typed hero animation — check JS near top for typed-text logic
- [x] Accessible navigation (roles, keyboard, focus-visible) — nav and links in index.php
- [x] Animated underline only for nav links (no focus box) — CSS using ::after
- [x] Contact form with client-side validation + AJAX — form id `contactForm` and fetch in JS
- [x] Modal feedback (OK-only dismissal) — modal markup and window._messageModal API
- [ ] Server-side contact handler (`contact.php`) — not included; recommended format below

## Notes for contact.php (recommended)
- Accepts POST: name, email, subject, message.
- Returns JSON:
  - Success: `{ "success": true }`
  - Validation errors: `{ "success": false, "errors": { "email": "Invalid email" } }`
- Front-end sends `Accept: application/json`.

## Testing checklist (what to look for)
- Open page, verify typed hero cycles through messages.
- Click nav links → smooth-scroll to sections; active link gets underline.
- Resize to mobile and test hamburger open/close and menu behavior.
- Fill contact form missing fields → modal shows validation message.
- Submit form → if contact.php present, modal shows success or error based on JSON.
- Click "Download CV" → placeholder modal appears.

## What to inspect in code (quick pointers)
- `index.php`: hero typed effect (requestAnimationFrame loop), modal utility (window._messageModal), contact form handler (fetch to contact.php).
- CSS: focus-visible handling and animated underline rules; mobile-specific hide rule for JSON blocks.
- Accessibility: nav has roles, menuitems and keyboard support via JS.

## Implemented features & UX decisions
- Focus-visible underline (no surrounding focus box) to meet accessibility and presentation goals.
- Modal requires explicit OK click to dismiss (per design requirement).
- Mobile layout centers content and hides decorative JSON blocks for clarity.

## Known issues / limitations
- contact.php is not provided; form submission requires a server endpoint to persist or email messages.
- CV download is a placeholder; add a static cv.pdf or implement a route to serve the file.

## Contact / Instructor help
- Email: johnlagriada@gmail.com
- If you need a quick demo or to test contact submission, I can add contact.php or a sample cv.pdf upon request.

Thank you — please let me know if you want the README shortened further or if you want me to add a sample contact.php.
