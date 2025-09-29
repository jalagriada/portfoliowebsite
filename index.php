<?php
// Removed server-side UA detection and conditional html class
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>John Lagriada</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
      :root {
        /* Light theme: white background, black text */
        --json-key: #000000;
        --json-string: #000000;
        --json-number: #000000;
        --json-boolean: #000000;
        --json-null: #000000;
        --json-bracket: #000000;
        --bg-dark: #ffffff;
        --bg-darker: #ffffff;
        --text-light: #000000;
        --muted-border: #e6e6e6;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Consolas", "Monaco", monospace;
      }

      body {
        background-color: var(--bg-dark);
        color: var(--text-light);
        line-height: 1.6;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
      }

      /* Navigation */
      nav {
        background-color: var(--bg-darker);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        padding: 15px 0;
        border-bottom: 1px solid var(--muted-border);
      }

      .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .logo {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--json-key);
      }

      .nav-links {
        display: flex;
        list-style: none;
      }

      .nav-links li {
        margin-left: 25px;
      }

      .nav-links a {
        color: var(--text-light);
        text-decoration: none;
        transition: color 0.3s;
        font-size: 0.9rem;
      }

      .nav-links a:hover {
        color: #333;
      }

      /* --- animated underline for nav links (ONLY underline; no box) --- */
      .nav-links a {
        position: relative;
        padding-bottom: 6px; /* space for the animated line */
        -webkit-tap-highlight-color: transparent;
        /* ensure no default background or outline from user agent */
        background: transparent;
        outline: none;
        border: none;
      }

      /* remove any focus visuals that form a box; keep accessible keyboard underline via :focus-visible */
      .nav-links a:focus,
      .nav-links a:active {
        outline: none;
        background: transparent;
        box-shadow: none;
      }

      /* If you want some keyboard hint only for keyboard users, use focus-visible (keeps only underline visible) */
      .nav-links a:focus-visible {
        outline: none;
        /* don't create a surrounding box; underline will show via ::after when focused */
      }

      .nav-links a::after {
        content: "";
        position: absolute;
        left: 50%;
        transform: translateX(-50%) scaleX(0);
        transform-origin: center;
        bottom: -6px; /* distance from text baseline */
        height: 3px;
        width: 100%;
        max-width: 120px;
        background-color: #000; /* black line */
        border-radius: 2px;
        transition: transform 220ms cubic-bezier(.2,.8,.2,1), opacity 180ms;
        opacity: 0.95;
        pointer-events: none;
      }

      .nav-links a:hover::after,
      .nav-links a:focus::after,
      .nav-links a.active::after {
        transform: translateX(-50%) scaleX(1);
      }

      @media (max-width: 768px) {
        .about-content,
        .contact-container,
        .skills-content {
          grid-template-columns: 1fr;
        }

        .skills-grid {
          grid-template-columns: 1fr;
        }

        /* mobile: hide default inline menu, provide dropdown */
        .nav-links {
          display: none;
          position: absolute;
          top: 64px;
          /* below header */
          right: 20px;
          background-color: var(--bg-darker);
          border: 1px solid var(--muted-border);
          border-radius: 6px;
          flex-direction: column;
          padding: 10px 15px;
          gap: 8px;
          z-index: 1100;
          min-width: 160px;
          box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        /* visible when open */
        .nav-links.open {
          display: flex;
        }

        .nav-links li {
          margin: 0;
          /* stack vertically; spacing handled by gap/padding */
        }

        .nav-links a {
          font-size: 1rem;
          padding: 6px 0;
          display: block;
        }

        .nav-links a:hover {
          color: #333;
        }

        .nav-toggle {
          display: block;
          /* show hamburger */
        }

        .hero-name {
          font-size: 1rem; /* slightly smaller on mobile so the typed text is less likely to wrap */
          max-width: 100%;
          line-height: 1.05;
        }

        /* ensure nav-left is compact */
        .nav-left {
          gap: 6px;
          flex: 1 1 auto;
          /* allow nav-left to grow so we can push toggle to edge */
          align-items: center;
        }

        /* Move the toggle to the far right on small screens */
        .nav-toggle {
          margin-left: auto;
          /* pushes the toggle to the right edge of the nav container */
        }

        /* keep nav-container contents aligned nicely */
        .nav-container {
          gap: 10px;
          align-items: center;
        }

        /* Push body content down so the fixed nav doesn't overlap first section content on small screens */
        section {
          padding-top: 110px;
        }

        /* Hero json container should still be constrained on mobile */
        .hero-content .json-container {
          max-width: 100%;
          padding: 20px;
        }

        /* --- NEW: center all text on mobile and hide json blocks --- */
        body,
        .container,
        section,
        .hero-content,
        .about-content,
        .skills-content,
        .contact-container {
          text-align: center;
        }

        /* ensure inner column blocks center their contents */
        .about-content > div,
        .skills-description,
        .skills-grid,
        .contact-form,
        .contact-info {
          text-align: center;
          margin-left: auto;
          margin-right: auto;
        }

        .contact-form .form-group {
          display: flex;
          flex-direction: column;
          align-items: center;
        }

        .contact-form .form-group input,
        .contact-form .form-group textarea {
          width: 100%;
          max-width: 420px;
        }

        .social-links {
          justify-content: center;
        }

        /* Hide JSON containers completely on mobile devices */
        .json-container {
          display: none !important;
        }
      }
      /* --- END underline-only styles --- */

      /* Hamburger / mobile toggle */
      .nav-left {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .nav-toggle {
        display: none;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 6px;
        margin-left: 6px;
        color: var(--json-key);
      }

      .nav-toggle:focus {
        outline: 2px solid rgba(0, 0, 0, 0.12);
        border-radius: 4px;
      }

      .nav-toggle .bar {
        display: block;
        width: 22px;
        height: 2px;
        background: var(--json-key);
        margin: 4px 0;
        transition: transform 0.25s, opacity 0.25s;
      }

      /* When nav is open we can animate bars to an X (simple) */
      .nav-toggle.open .bar:nth-child(1) {
        transform: translateY(6px) rotate(45deg);
      }

      .nav-toggle.open .bar:nth-child(2) {
        opacity: 0;
      }

      .nav-toggle.open .bar:nth-child(3) {
        transform: translateY(-6px) rotate(-45deg);
      }

      /* Section Styling */
      section {
        padding: 100px 0 50px;
        min-height: 100vh;
        display: flex;
        align-items: center;
      }

      .section-title {
        font-size: 1.8rem;
        margin-bottom: 30px;
        color: var(--json-key);
        /* removed left vertical bar */
        padding-left: 0;
      }

      /* JSON Styling */
      .json-container {
        background-color: var(--bg-darker);
        border-radius: 5px;
        padding: 30px;
        /* removed left border that created the '|' visual */
        border-left: none;
        box-shadow: rgb(29, 28, 28) 0px 0px 10px -3px;
        width: 100%;
      }

      .json-line {
        margin-bottom: 15px;
        display: flex;
        flex-wrap: wrap;
      }

      .json-key {
        color: var(--json-key);
      }

      .json-string {
        color: var(--json-string);
      }

      .json-number {
        color: var(--json-number);
      }

      .json-boolean {
        color: var(--json-boolean);
      }

      .json-bracket {
        color: var(--json-bracket);
        font-weight: bold;
      }

      .json-indent {
        margin-left: 20px;
      }

      /* Hero Section */
      #hero {
        text-align: center;
      }

      .hero-content {
        width: 100%;
        /* ensure heading and json container are independent and centered */
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
      }

      .hero-name {
        font-size: 3rem;
        margin-bottom: 20px;
        color: var(--json-key);
        line-height: 1.1;
        display: block;
        /* allow wrapping (prevents page from expanding when long text types) */
        white-space: normal;
        max-width: 900px; /* constrain heading width so it won't force layout changes */
        text-align: center;
        overflow-wrap: break-word;
      }

      /* Typing cursor (blinking) */
      .typed-cursor {
        display: inline-block;
        width: 2px;
        height: 1.1em;
        background: var(--json-key);
        margin-left: 8px;
        vertical-align: bottom;
        animation: blink 1s steps(2, start) infinite;
      }
      @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
      }

      /* ensure the hero's json container keeps a fixed max width independent of the heading */
      .hero-content .json-container {
        width: auto;
        max-width: 760px; /* keep same visual size as other sections */
        margin: 0 auto;
        box-sizing: border-box;
      }

      .cta-button {
        display: inline-block;
        background-color: transparent;
        color: var(--json-key);
        border: 2px solid var(--json-key);
        padding: 12px 30px;
        font-size: 1rem;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s;
        margin-top: 20px;
        cursor: pointer;
      }

      .cta-button:hover {
        background-color: #f2f2f2;
        color: var(--json-key);
      }

      /* About Section */
      .about-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
      }

      /* Skills Section */
      .skills-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: start;
      }

      .skills-description p {
        margin-bottom: 1rem;
        color: var(--text-light);
      }

      .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
      }

      .skill-category {
        margin-bottom: 30px;
      }

      .skill-category h3 {
        color: var(--json-string);
        margin-bottom: 15px;
        border-bottom: 1px solid var(--muted-border);
        padding-bottom: 5px;
      }

      .skill-item {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
      }

      .skill-item i {
        margin-right: 10px;
        color: var(--json-key);
      }

      /* Experience Section */
      .experience-item {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--muted-border);
      }

      .experience-item:last-child {
        border-bottom: none;
      }

      .experience-title {
        color: var(--json-key);
        font-size: 1.2rem;
        margin-bottom: 5px;
      }

      .experience-company {
        color: var(--json-string);
        margin-bottom: 10px;
      }

      .experience-date {
        color: var(--json-number);
        font-size: 0.9rem;
        margin-bottom: 10px;
      }

      .download-cv {
        margin-top: 30px;
        text-align: center;
      }

      /* Contact Section */
      .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
      }

      .contact-info {
        margin-bottom: 20px;
      }

      .contact-info i {
        margin-right: 10px;
        color: var(--json-key);
        width: 20px;
      }

      .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
      }

      .social-links a {
        color: var(--text-light);
        font-size: 1.5rem;
        transition: color 0.3s;
      }

      .social-links a:hover {
        color: #333;
      }

      .contact-form {
        display: flex;
        flex-direction: column;
      }

      .form-group {
        margin-bottom: 20px;
      }

      .form-group label {
        display: block;
        margin-bottom: 5px;
        color: var(--json-key);
      }

      .form-group input,
      .form-group textarea {
        width: 100%;
        padding: 10px;
        background-color: var(--bg-darker);
        border: 1px solid var(--muted-border);
        border-radius: 5px;
        color: var(--text-light);
        font-size: 1rem;
      }

      .form-group textarea {
        min-height: 150px;
        resize: vertical;
      }

      .submit-btn {
        background-color: transparent;
        color: var(--json-key);
        border: 2px solid var(--json-key);
        padding: 12px 30px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
        align-self: flex-start;
      }

      .submit-btn:hover {
        background-color: #f2f2f2;
        color: var(--json-key);
      }

      /* Footer */
      footer {
        background-color: var(--bg-darker);
        padding: 20px 0;
        text-align: center;
        border-top: 1px solid var(--muted-border);
        margin-top: 50px;
      }

      /* Responsive */
      @media (max-width: 768px) {
        .about-content,
        .contact-container,
        .skills-content {
          grid-template-columns: 1fr;
        }

        .skills-grid {
          grid-template-columns: 1fr;
        }

        /* mobile: hide default inline menu, provide dropdown */
        .nav-links {
          display: none;
          position: absolute;
          top: 64px;
          /* below header */
          right: 20px;
          background-color: var(--bg-darker);
          border: 1px solid var(--muted-border);
          border-radius: 6px;
          flex-direction: column;
          padding: 10px 15px;
          gap: 8px;
          z-index: 1100;
          min-width: 160px;
          box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        /* visible when open */
        .nav-links.open {
          display: flex;
        }

        .nav-links li {
          margin: 0;
          /* stack vertically; spacing handled by gap/padding */
        }

        .nav-links a {
          font-size: 1rem;
          padding: 6px 0;
          display: block;
        }

        .nav-links a:hover {
          color: #333;
        }

        .nav-toggle {
          display: block;
          /* show hamburger */
        }

        .hero-name {
          font-size: 1rem; /* slightly smaller on mobile so the typed text is less likely to wrap */
          max-width: 100%;
          line-height: 1.05;
        }

        /* ensure nav-left is compact */
        .nav-left {
          gap: 6px;
          flex: 1 1 auto;
          /* allow nav-left to grow so we can push toggle to edge */
          align-items: center;
        }

        /* Move the toggle to the far right on small screens */
        .nav-toggle {
          margin-left: auto;
          /* pushes the toggle to the right edge of the nav container */
        }

        /* keep nav-container contents aligned nicely */
        .nav-container {
          gap: 10px;
          align-items: center;
        }

        /* Push body content down so the fixed nav doesn't overlap first section content on small screens */
        section {
          padding-top: 110px;
        }

        /* Hero json container should still be constrained on mobile */
        .hero-content .json-container {
          max-width: 100%;
          padding: 20px;
        }

        /* --- NEW: center all text on mobile and hide json blocks --- */
        body,
        .container,
        section,
        .hero-content,
        .about-content,
        .skills-content,
        .contact-container {
          text-align: center;
        }

        /* ensure inner column blocks center their contents */
        .about-content > div,
        .skills-description,
        .skills-grid,
        .contact-form,
        .contact-info {
          text-align: center;
          margin-left: auto;
          margin-right: auto;
        }

        .contact-form .form-group {
          display: flex;
          flex-direction: column;
          align-items: center;
        }

        .contact-form .form-group input,
        .contact-form .form-group textarea {
          width: 100%;
          max-width: 420px;
        }

        .social-links {
          justify-content: center;
        }

        /* Hide JSON containers completely on mobile devices */
        .json-container {
          display: none !important;
        }
      }

      /* Small improvement: raise hero title slightly on mobile so it sits higher under the fixed nav */
      @media (max-width: 768px) {
        /* Reduce the large generic section top padding for the hero only so the hero heading appears higher */
        section#hero {
          padding-top: 72px; /* lower than the generic 110px used for other sections on mobile */
        }

        /* Nudge the hero content a bit upward for better visual alignment.
           Use a small translate (kept subtle) so layout remains natural. */
        .hero-content {
          transform: translateY(-10px);
        }

        /* Ensure heading spacing remains comfortable after the nudge */
        .hero-name {
          margin-top: 0;
        }
      }

      /* Respect reduced-motion: don't apply translate for users who opted out of animations */
      @media (max-width: 768px) and (prefers-reduced-motion: reduce) {
        .hero-content {
          transform: none !important;
        }
      }

      /* Small improvement for larger displays where nav-links are inline */
      @media (min-width: 769px) {
        .nav-links {
          position: static;
          background: transparent;
          border: none;
          padding: 0;
          gap: 0;
          box-shadow: none;
          min-width: auto;
        }

        .skills-content {
          grid-template-columns: 1fr 1fr;
        }
      }

      /* ============ Modal styles ============ */
      .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2000;
        opacity: 0;
        pointer-events: none;
        transition: opacity 180ms ease;
      }
      .modal-overlay[aria-hidden="false"] {
        opacity: 1;
        pointer-events: auto;
      }
      .modal {
        background: #fff;
        color: #000;
        width: 92%;
        max-width: 520px;
        border-radius: 8px;
        box-shadow: 0 12px 40px rgba(255, 255, 255, 0.28);
        transform: translateY(8px);
        transition: transform 180ms ease;
        overflow: hidden;
      }
      .modal-overlay[aria-hidden="false"] .modal {
        transform: translateY(0);
      }
      .modal-header {
        padding: 16px 20px;
        border-bottom: 1px solid #eee;
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:12px;
      }
      .modal-title {
        font-size: 1.05rem;
        font-weight:700;
        margin:0;
      }
      .modal-body {
        padding: 18px 20px;
        font-size: 0.98rem;
        line-height:1.4;
        color: #222;
      }
      .modal-actions {
        padding: 12px 16px;
        display:flex;
        justify-content:flex-end;
        gap:8px;
        border-top: 1px solid #f1f1f1;
        background: #fafafa;
      }
      .modal-close, .modal-ok {
        background: transparent;
        border: none;
        font-size: 1.1rem;
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 6px;
      }
      .modal-ok.cta-button {
        background: transparent;
        border: 2px solid #000;
        padding: 8px 14px;
      }
      .modal-ok.cta-button:hover {
        background: #f2f2f2;
      }
      @media (prefers-reduced-motion: reduce) {
        .modal, .modal-overlay { transition: none; }
      }
      /* ========== end modal styles ========== */

      /* ========== ADDED: Animations & utility classes ========== */
      @media (prefers-reduced-motion: no-preference) {
        /* subtle entrance animation for sections / containers */
        .animate-on-scroll {
          opacity: 0;
          transform: translateY(12px) scale(0.995);
          transition: opacity 520ms cubic-bezier(.2,.8,.2,1), transform 520ms cubic-bezier(.2,.8,.2,1);
          will-change: transform, opacity;
        }
        .animate-on-scroll.in-view {
          opacity: 1;
          transform: none;
        }

        /* stagger-ready items (child elements will receive inline transition delays) */
        .stagger-child > * {
          opacity: 0;
          transform: translateY(8px);
          transition: opacity 420ms ease, transform 420ms ease;
          will-change: opacity, transform;
        }
        .stagger-child.in-view > * {
          opacity: 1;
          transform: none;
        }

        /* hero entrance */
        .hero-content.animate-on-scroll { transition-duration: 680ms; transition-timing-function: cubic-bezier(.16,.9,.3,1); }

        /* logo micro-pop */
        .logo {
          display: inline-block;
          transform-origin: center;
          transition: transform 420ms cubic-bezier(.2,.8,.2,1), opacity 420ms;
          opacity: 0.98;
        }
        .logo.pop {
          animation: logoPop 720ms cubic-bezier(.2,.8,.2,1) both;
        }
        @keyframes logoPop {
          0% { transform: scale(0.92); opacity: 0.6; }
          60% { transform: scale(1.08); opacity: 1; }
          100% { transform: scale(1); opacity: 1; }
        }

        /* nav links subtle slide and fade */
        .nav-links a {
          transition: color 220ms ease, transform 200ms ease;
        }
        .nav-links a:hover, .nav-links a:focus {
          transform: translateY(-3px);
        }

        /* CTA buttons: lift on hover and slightly depress on active */
        .cta-button {
          transition: transform 180ms ease, box-shadow 180ms ease, background-color 180ms;
        }
        .cta-button:hover {
          transform: translateY(-4px);
          box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }
        .cta-button:active {
          transform: translateY(-1px) scale(0.997);
        }

        /* JSON line micro-fade (we target .json-container .json-line in JS for stagger delays) */
        .json-container .json-line {
          opacity: 0;
          transform: translateY(6px);
          transition: opacity 360ms ease, transform 360ms ease;
        }
        .json-container.in-view .json-line {
          opacity: 1;
          transform: none;
        }

        /* skill items pop-in */
        .skill-item {
          opacity: 0;
          transform: translateY(8px) scale(0.995);
          transition: opacity 420ms cubic-bezier(.2,.8,.2,1), transform 420ms cubic-bezier(.2,.8,.2,1);
        }
        .skill-item.in-view {
          opacity: 1;
          transform: none;
        }

        /* modal subtle lift (already uses transitions; add slight easing) */
        .modal-overlay[aria-hidden="false"] .modal {
          transition: transform 240ms cubic-bezier(.2,.8,.2,1), box-shadow 240ms;
        }
      }

      /* Respect reduced motion preferences */
      @media (prefers-reduced-motion: reduce) {
        .animate-on-scroll,
        .stagger-child > *,
        .json-container .json-line,
        .skill-item,
        .logo,
        .cta-button,
        .nav-links a,
        .modal {
          transition: none !important;
          animation: none !important;
          transform: none !important;
        }
      }
      /* ========== END ADDED ANIMATIONS ========== */
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <nav role="navigation" aria-label="Main navigation">
      <div class="container nav-container animate-on-scroll">
        <div class="nav-left">
          <div class="logo">JATL</div>
          <!-- Mobile hamburger toggle -->
          <button
            class="nav-toggle"
            aria-label="Toggle navigation"
            aria-expanded="false"
            aria-controls="primary-navigation"
          >
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </button>
        </div>
        <ul id="primary-navigation" class="nav-links" role="menubar">
          <li role="none">
            <a role="menuitem" href="#hero">Home</a>
          </li>
          <li role="none">
            <a role="menuitem" href="#about">About</a>
          </li>
          <li role="none">
            <a role="menuitem" href="#skills">Skills</a>
          </li>
          <li role="none">
            <a role="menuitem" href="#experience">Experience</a>
          </li>
          <li role="none">
            <a role="menuitem" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="animate-on-scroll">
      <div class="container">
        <div class="hero-content animate-on-scroll">
          <!-- replaced static heading with a typed element -->
          <h1 class="hero-name" aria-live="polite">
            <span id="typed-text" aria-hidden="false"></span
            ><span class="typed-cursor" aria-hidden="true"></span>
          </h1>
          
          <div class="json-container animate-on-scroll">
            <div class="json-line">
              <span class="json-bracket">{</span>
            </div>
            <div class="json-line json-indent">
              <span class="json-key">"profession"</span>:
              <span class="json-string">"Security Researcher"</span>,
            </div>
            <div class="json-line json-indent">
              <span class="json-key">"specialization"</span>:
              <span class="json-string">"Bug Bounty Hunting"</span>,
            </div>
            <div class="json-line json-indent">
              <span class="json-key">"platforms"</span>:
              <span class="json-string">"HackerOne"</span>,
              <span class="json-string">"Google VRP"</span>,
            </div>
            <div class="json-line json-indent">
              <span class="json-key">"status"</span>:
              <span class="json-string">"Actively hunting for vulnerabilities"</span>
            </div>
            <div class="json-line">
              <span class="json-bracket">}</span>
            </div>
          </div>
          <a href="#contact" class="cta-button">Connect With Me</a>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="animate-on-scroll">
      <div class="container">
        <h2 class="section-title">About Me</h2>
        <div class="about-content">
          <div class="json-container animate-on-scroll">
            <div class="json-line">
              <span class="json-bracket">{</span>
            </div>
            <div class="json-line json-indent">
              <span class="json-key">"background"</span>:
              <span class="json-string">"Security Researcher with focus on web application security"</span>,
            </div>
            <div class="json-line json-indent">
              <span class="json-key">"experience"</span>:
              <span class="json-string">"Active bug bounty hunter on HackerOne with valid bug reports submitted to Google"</span>,
            </div>
            <div class="json-line json-indent">
              <span class="json-key">"methodology"</span>:
              <span class="json-string">"Comprehensive security testing using manual techniques and automated tools"</span>,
            </div>
            <div class="json-line json-indent">
              <span class="json-key">"passion"</span>:
              <span class="json-string">"Making the internet safer by identifying and reporting security vulnerabilities"</span>
            </div>
            <div class="json-line">
              <span class="json-bracket">}</span>
            </div>
          </div>
          <div>
            <p>
              I'm a dedicated security researcher specializing in identifying vulnerabilities in web
              applications. My journey in cybersecurity began with a curiosity about how systems can be
              secured and has evolved into a professional pursuit of finding and responsibly disclosing
              security flaws.
            </p>
            <br />
            <p>
              Through platforms like HackerOne, I've honed my skills in vulnerability assessment and
              penetration testing, successfully identifying valid security issues in high-profile targets
              including Google. While competition is fierce in bug bounty programs, each discovery contributes
              to a more secure digital ecosystem.
            </p>
            <br />
            <p>
              My approach combines systematic testing methodologies with creative thinking to uncover
              vulnerabilities that automated scanners might miss.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="animate-on-scroll">
      <div class="container">
        <h2 class="section-title">Skills & Expertise</h2>
        <div class="skills-content">
          <!-- Left column: descriptive paragraphs + compact JSON (aligned like About) -->
          <div class="skills-description">
            <p>
              I'm experienced in web application security testing with a focus on discovering issues that
              automated scanners may miss. I combine manual techniques with targeted automation to validate
              findings and produce high-quality reports.
            </p>
            <p>
              My testing focuses on authentication, access control, data exposure, and injection flaws. I
              routinely use Burp Suite and Linux security tools during assessments and participate in bug
              bounty programs to stay sharp.
            </p>
            <div class="json-container animate-on-scroll" style="margin-top: 20px;">
              <div class="json-line">
                <span class="json-bracket">{</span>
              </div>
              <div class="json-line json-indent">
                <span class="json-key">"primary_os"</span>:
                <span class="json-string">"Linux"</span>,
              </div>
              <div class="json-line json-indent">
                <span class="json-key">"primary_tool"</span>:
                <span class="json-string">"Burp Suite"</span>,
              </div>
              <div class="json-line json-indent">
                <span class="json-key">"testing_focus"</span>:
                <span class="json-string">"Web Applications"</span>,
                <span class="json-string">"APIs"</span>,
              </div>
              <div class="json-line json-indent">
                <span class="json-key">"vulnerability_specialties"</span>:
                <span class="json-string">"XSS"</span>,
                <span class="json-string">"IDOR"</span>,
                <span class="json-string">"SQLi"</span>,
                <span class="json-string">"Authentication Bypass"</span>
              </div>
              <div class="json-line">
                <span class="json-bracket">}</span>
              </div>
            </div>
          </div>

          <!-- Right column: the skill categories grid -->
          <div>
            <div class="skills-grid">
              <div class="skill-category">
                <h3>Technical Skills</h3>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Web Application Security Testing</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Vulnerability Assessment</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Penetration Testing</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Security Research</span>
                </div>
              </div>

              <div class="skill-category">
                <h3>Tools & Platforms</h3>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Burp Suite</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Linux Security Tools</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>HackerOne</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Google VRP</span>
                </div>
              </div>

              <div class="skill-category">
                <h3>Soft Skills</h3>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Problem Solving</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Attention to Detail</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Persistence</span>
                </div>
                <div class="skill-item animate-on-scroll">
                  <i class="fas fa-check"></i>
                  <span>Communication</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="animate-on-scroll">
      <div class="container">
        <h2 class="section-title">Experience & Resume</h2>
        <div class="experience-item animate-on-scroll">
          <h3 class="experience-title">Security Researcher / Bug Bounty Hunter</h3>
          <p class="experience-company">HackerOne & Various Bug Bounty Programs</p>
          <p class="experience-date">2025 - Present</p>
          <p>
            Actively participating in bug bounty programs, with a focus on web application security.
            Successfully identified and reported valid security vulnerabilities to multiple organizations
            including Google. Developed systematic approaches to vulnerability discovery and reporting.
          </p>
        </div>

        <div class="experience-item animate-on-scroll">
          <h3 class="experience-title">Independent Security Research</h3>
          <p class="experience-company">Personal Projects & Learning</p>
          <p class="experience-date">2018 - 2025</p>
          <p>
            Self-directed study and practice in cybersecurity fundamentals, web application security, and
            penetration testing methodologies. Built home lab environments for testing and honing security
            assessment skills.
          </p>
        </div>

        <div class="json-container animate-on-scroll" style="margin-top: 40px;">
          <div class="json-line">
            <span class="json-bracket">{</span>
          </div>
          <div class="json-line json-indent">
            <span class="json-key">"bug_bounty_platform"</span>:
            <span class="json-string">"HackerOne"</span>,
            <span class="json-string">"Google"</span>,
          </div>
          <div class="json-line json-indent">
            <span class="json-key">"top_achievement"</span>:
            <span class="json-string">"Valid bug reports to Google"</span>
          </div>
          <div class="json-line">
            <span class="json-bracket">}</span>
          </div>
        </div>

        <div class="download-cv animate-on-scroll">
          <a href="#" class="cta-button">
            <i class="fas fa-download"></i> Download CV
          </a>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="animate-on-scroll">
      <div class="container">
        <h2 class="section-title">Contact Me</h2>
        <div class="contact-container">
          <div>
            <div class="contact-info">
              <i class="fas fa-envelope"></i>
              <span>johnlagriada@gmail.com</span>
            </div>
            <div class="json-container animate-on-scroll">
              <div class="json-line">
                <span class="json-bracket">{</span>
              </div>
              <div class="json-line json-indent"></div>
              <div class="json-line json-indent">
                <span class="json-key">"response_time"</span>:
                <span class="json-string">"Within 24 hours"</span>,
              </div>
              <div class="json-line json-indent">
                <span class="json-key">"availability"</span>:
                <span class="json-string">"Open to security collaboration and bug bounty tips"</span>
              </div>
              <div class="json-line">
                <span class="json-bracket">}</span>
              </div>
            </div>

            <div class="social-links">
              <a href="https://github.com/jalagriada" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-github"></i>
              </a>
              <a href="https://facebook.com/johnlagriada" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-facebook"></i>
              </a>
            </div>
          </div>

          <div class="contact-form animate-on-scroll">
            <!-- Updated form: includes name attributes and posts to contact.php -->
            <form id="contactForm" action="contact.php" method="post" novalidate>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" />
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
              </div>
              <button type="submit" class="submit-btn">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
     <footer>
       <div class="container">
         <p>&copy; 2025 John Lagriada. All rights reserved.</p>
       </div>
     </footer>

    <!-- Modal HTML (used for contact/CV feedback) -->
    <div id="messageModalOverlay" class="modal-overlay" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="modalTitle" aria-describedby="modalMessage">
      <div class="modal" role="document">
        <div class="modal-header">
          <h3 id="modalTitle" class="modal-title">Message</h3>
          <!-- removed modal-close (X) button per request -->
        </div>
        <div class="modal-body">
          <p id="modalMessage">...</p>
        </div>
        <div class="modal-actions">
          <button id="modalOk" class="modal-ok cta-button">OK</button>
        </div>
      </div>
    </div>

    <script>
      // Smooth, 60fps-synced typing effect using requestAnimationFrame and time-based stepping.
      (function () {
        const el = document.getElementById("typed-text");
        if (!el) return;

        const texts = [
          "Hi! I'm John Lagriada",
          "I'm a Security Researcher"
        ];

        // Configuration: adjust to taste
        const charsPerSecond = 30; // effective typing speed (chars/sec)
        const delCharsPerSecond = 60; // deleting speed (chars/sec) - faster for snappier deletes
        const pauseAfterType = 1400; // ms to pause after typing full string
        const pauseAfterDelete = 350; // ms to pause after deleting before next string

        const charDuration = 1000 / charsPerSecond;
        const delCharDuration = 1000 / delCharsPerSecond;

        let textIndex = 0;
        let charIndex = 0;
        let mode = "typing"; // typing | pauseAfterType | deleting | pauseAfterDelete
        let lastTime = performance.now();
        let accum = 0;
        let pauseRemaining = 0;

        // Helper to set displayed text once (keeps layout stable)
        function setText(s) {
          el.textContent = s;
        }

        // Ensure initial state
        setText("");

        function step(now) {
          const dt = now - lastTime;
          lastTime = now;

          if (mode === "typing") {
            accum += dt;
            // advance by however many chars fit into accumulated time
            while (accum >= charDuration) {
              accum -= charDuration;
              charIndex++;
              const current = texts[textIndex];
              setText(current.slice(0, charIndex));
              if (charIndex >= current.length) {
                mode = "pauseAfterType";
                pauseRemaining = pauseAfterType;
                accum = 0;
                break;
              }
            }
          } else if (mode === "pauseAfterType") {
            pauseRemaining -= dt;
            if (pauseRemaining <= 0) {
              mode = "deleting";
              accum = 0;
            }
          } else if (mode === "deleting") {
            accum += dt;
            while (accum >= delCharDuration) {
              accum -= delCharDuration;
              charIndex--;
              const current = texts[textIndex];
              setText(current.slice(0, Math.max(0, charIndex)));
              if (charIndex <= 0) {
                mode = "pauseAfterDelete";
                pauseRemaining = pauseAfterDelete;
                textIndex = (textIndex + 1) % texts.length;
                accum = 0;
                break;
              }
            }
          } else if (mode === "pauseAfterDelete") {
            pauseRemaining -= dt;
            if (pauseRemaining <= 0) {
              mode = "typing";
              // ensure charIndex starts from 0 for next text
              charIndex = 0;
              accum = 0;
            }
          }

          // request next frame
          requestAnimationFrame(step);
        }

        // Start loop synced to display refresh
        lastTime = performance.now();
        requestAnimationFrame(step);
      })();

      // Smooth scrolling for navigation links
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          // If link is only a hash to '#', ignore
          const targetId = this.getAttribute("href");
          if (!targetId || targetId === "#") return;
          e.preventDefault();
          const targetElement = document.querySelector(targetId);
          if (targetElement) {
            window.scrollTo({
              top: targetElement.offsetTop - 70,
              behavior: "smooth",
            });
          }
        });
      });

      // --- Modal utility ---
      (function () {
        const overlay = document.getElementById("messageModalOverlay");
        const titleEl = document.getElementById("modalTitle");
        const msgEl = document.getElementById("modalMessage");
        const okBtn = document.getElementById("modalOk");

        let lastFocused = null;

        // showModal: options ignored — modal must be dismissed by OK button only
        function showModal(title, message /* options ignored */) {
          if (!overlay) return;
          titleEl.textContent = title || "";
          if (typeof message === "string") {
            msgEl.textContent = message;
          } else if (message instanceof Node) {
            msgEl.innerHTML = "";
            msgEl.appendChild(message);
          } else {
            msgEl.innerHTML = message;
          }

          // save last focused element and show modal
          lastFocused = document.activeElement;
          overlay.setAttribute("aria-hidden", "false");

          // focus OK button so user must click it to dismiss
          if (okBtn && typeof okBtn.focus === "function") okBtn.focus();
        }

        function hideModal() {
          if (!overlay) return;
          overlay.setAttribute("aria-hidden", "true");
          try {
            if (lastFocused && typeof lastFocused.focus === "function") lastFocused.focus();
          } catch (e) {}
        }

        // Only OK button closes the modal
        if (okBtn) okBtn.addEventListener("click", hideModal);

        // Do NOT close modal on overlay clicks, Escape key, or autoClose.
        // Keep focus trapping while modal is open.
        document.addEventListener("keydown", function (e) {
          if (overlay.getAttribute("aria-hidden") === "false" && e.key === "Tab") {
            const focusable = overlay.querySelectorAll('button, [href], input, textarea, select, [tabindex]:not([tabindex="-1"])');
            if (!focusable || focusable.length === 0) return;
            const first = focusable[0];
            const last = focusable[focusable.length - 1];
            if (e.shiftKey && document.activeElement === first) {
              e.preventDefault();
              last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
              e.preventDefault();
              first.focus();
            }
          }
        });

        window._messageModal = { show: showModal, hide: hideModal };
      })();

      // Contact form submission (AJAX) using modal for feedback
      (function () {
        const contactForm = document.getElementById("contactForm");
        if (!contactForm) return;

        contactForm.addEventListener("submit", async function (e) {
          e.preventDefault();

          const submitBtn = contactForm.querySelector('button[type="submit"]');
          const originalText = submitBtn.textContent;
          submitBtn.disabled = true;
          submitBtn.textContent = "Sending...";

          // Small client-side checks
          const name = contactForm.name.value.trim();
          const email = contactForm.email.value.trim();
          const message = contactForm.message.value.trim();
          if (!name || !email || !message) {
            window._messageModal.show("Validation required", "Please fill Name, Email and Message.");
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
            return;
          }

          try {
            const formData = new FormData(contactForm);
            const resp = await fetch(contactForm.action, {
              method: "POST",
              body: formData,
              headers: { Accept: "application/json" }
            });

            const data = await resp.json().catch(() => null);

            if (resp.ok && data && data.success) {
              contactForm.reset();
              window._messageModal.show("Message sent", "Thanks — your message was saved. I will get back to you soon.", { autoClose: 3000 });
            } else if (data && data.errors) {
              const messages = Object.values(data.errors).join("\n");
              window._messageModal.show("Please fix the following", messages);
            } else {
              console.error("Server error response:", data);
              window._messageModal.show("Server error", "An error occurred while sending your message. Please try again later.");
            }
          } catch (err) {
            console.error("Network or server error:", err);
            window._messageModal.show("Network error", "Could not send message — network or server error.");
          } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
          }
        });
      })();

      // Replace CV placeholder alert with modal
      (function () {
        const cvBtn = document.querySelector(".download-cv a");
        if (!cvBtn) return;
        cvBtn.addEventListener("click", function (e) {
          e.preventDefault();
          window._messageModal.show("Download CV", "CV download functionality would be implemented here. For now, this is a placeholder.");
        });
      })();

      // Mobile nav toggle logic
      (function () {
        const navToggle = document.querySelector(".nav-toggle");
        const navLinks = document.querySelector(".nav-links");
        if (!navToggle || !navLinks) return;
        navToggle.addEventListener("click", function (e) {
          const isOpen = navLinks.classList.toggle("open");
          navToggle.classList.toggle("open", isOpen);
          navToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
        });
        // Close mobile menu when a nav link is clicked (good UX)
        navLinks.querySelectorAll("a").forEach((link) => {
          link.addEventListener("click", function () {
            if (navLinks.classList.contains("open")) {
              navLinks.classList.remove("open");
              navToggle.classList.remove("open");
              navToggle.setAttribute("aria-expanded", "false");
            }
          });
        });
        // Close the menu when clicking outside the menu on mobile
        document.addEventListener("click", function (e) {
          if (window.innerWidth <= 768) {
            const target = e.target;
            if (!navLinks.contains(target) && !navToggle.contains(target)) {
              if (navLinks.classList.contains("open")) {
                navLinks.classList.remove("open");
                navToggle.classList.remove("open");
                navToggle.setAttribute("aria-expanded", "false");
              }
            }
          }
        });
        // Close menu on Escape key
        document.addEventListener("keydown", function (e) {
          if (e.key === "Escape" && navLinks.classList.contains("open")) {
            navLinks.classList.remove("open");
            navToggle.classList.remove("open");
            navToggle.setAttribute("aria-expanded", "false");
            navToggle.focus();
          }
        });
      })();

      // --- active nav-link handling + scroll spy using IntersectionObserver ---
      (function () {
        const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');
        if (!navLinks || navLinks.length === 0) return;

        function clearActive() {
          navLinks.forEach((l) => l.classList.remove("active"));
        }

        // Click and keyboard activation handling
        navLinks.forEach((link) => {
          link.addEventListener("click", function (e) {
            // Mark active immediately for better UX
            clearActive();
            this.classList.add("active");

            // close mobile menu if open
            const navLinksParent = document.querySelector(".nav-links");
            const navToggle = document.querySelector(".nav-toggle");
            if (navLinksParent && navLinksParent.classList.contains("open")) {
              navLinksParent.classList.remove("open");
              if (navToggle) {
                navToggle.classList.remove("open");
                navToggle.setAttribute("aria-expanded", "false");
              }
            }
          });

          // Allow keyboard users to activate via Enter/Space
          link.addEventListener("keydown", function (e) {
            if (e.key === "Enter" || e.key === " ") {
              e.preventDefault();
              this.click();
            }
          });
        });

        // Build sections list
        const sections = Array.from(navLinks)
          .map((link) => {
            const id = link.getAttribute("href");
            return id && id.startsWith("#") ? document.querySelector(id) : null;
          })
          .filter(Boolean);

        if (sections.length === 0) return;

        const observerOptions = {
          root: null,
          rootMargin: "-30% 0px -50% 0px", // trigger when section is roughly in the middle
          threshold: 0,
        };

        const observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              const id = "#" + entry.target.id;
              clearActive();
              const activeLink = document.querySelector(`.nav-links a[href="${id}"]`);
              if (activeLink) activeLink.classList.add("active");
            }
          });
        }, observerOptions);

        sections.forEach((s) => observer.observe(s));

        // On page load, honor hash if present
        if (location.hash) {
          const link = document.querySelector(`.nav-links a[href="${location.hash}"]`);
          if (link) {
            clearActive();
            link.classList.add("active");
          }
        }
      })();

      /* ========== REPLACED: IntersectionObserver-based reveal + repeatable fade logic ========== */
      (function () {
        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        const observerOptions = { root: null, rootMargin: '0px 0px -12% 0px', threshold: 0.12 };

        const observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            const el = entry.target;
            if (entry.isIntersecting) {
              // add visible class (fade in)
              el.classList.add('in-view');
              // stagger child lines (json-lines, skill items, immediate children)
              const jsonLines = el.querySelectorAll && el.querySelectorAll('.json-line');
              if (jsonLines && jsonLines.length) {
                jsonLines.forEach((ln, i) => ln.style.transitionDelay = `${i * 60}ms`);
              }
              const skillItems = el.querySelectorAll && el.querySelectorAll('.skill-item');
              if (skillItems && skillItems.length) {
                skillItems.forEach((si, i) => si.style.transitionDelay = `${i * 45}ms`);
              }
              // immediate children stagger
              const children = el.querySelectorAll && el.querySelectorAll(':scope > *');
              if (children && children.length) {
                children.forEach((c, i) => c.style.transitionDelay = `${Math.min(i * 55, 480)}ms`);
              }
            } else {
              // remove visible class when element leaves viewport -> fade out (re-trigger on re-enter)
              el.classList.remove('in-view');
              // clear any per-item transitionDelay to keep next reveal consistent
              (el.querySelectorAll && el.querySelectorAll('.json-line, .skill-item, :scope > *') || []).forEach((n) => {
                n.style.transitionDelay = '';
              });
            }
          });
        }, observerOptions);

        // Observe targets: nav, sections, hero content, json-container, skill-item and experience items, contact form, download-cv
        const targets = [
          ...document.querySelectorAll('nav'),
          ...document.querySelectorAll('section'),
          ...document.querySelectorAll('.hero-content'),
          ...document.querySelectorAll('.json-container'),
          ...document.querySelectorAll('.skill-item'),
          ...document.querySelectorAll('.experience-item'),
          ...document.querySelectorAll('.contact-form'),
          ...document.querySelectorAll('.download-cv'),
          ...document.querySelectorAll('.nav-container')
        ];

        targets.forEach((t) => {
          // ensure baseline class present
          if (!t.classList.contains('animate-on-scroll')) t.classList.add('animate-on-scroll');
          // mark as possible stagger container
          if (t.childElementCount > 1) t.classList.add('stagger-child');
          observer.observe(t);
        });

        // Small first-paint micro-pop for logo (keeps earlier feel)
        const logo = document.querySelector('.logo');
        if (logo) {
          setTimeout(() => {
            logo.classList.add('pop');
            setTimeout(() => logo.classList.remove('pop'), 900);
          }, 260);
        }
      })();
      /* ========== END reveal + stagger logic ========== */
    </script>
  </body>
</html>
