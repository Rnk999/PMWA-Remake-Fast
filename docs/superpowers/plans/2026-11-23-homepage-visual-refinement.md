# Homepage Visual and Interaction Refinement Implementation Plan

> **For agentic workers:** Use native in-session implementation. Steps use checkbox syntax for tracking.

**Goal:** Refine the Phitsanulok municipal waterworks homepage while retaining the PHP structure, existing interactions, and government-service visual tone.

**Architecture:** Keep the existing PHP sections and partials, reorder only the news section, and render chart bars as HTML elements from separate JavaScript mock datasets. Use existing CSS and JavaScript for the search glow, tooltips, year selection, focus states, and responsive behavior.

**Tech Stack:** PHP, HTML, CSS, vanilla JavaScript. No chart library or new dependency.

**Spec:** User request, “Phase 3.4.2 — Homepage Visual & Interaction Refinement” (2026-11-23).

## Global Constraints

- Preserve PHP structure and existing partials.
- Use HTML/CSS bars and JavaScript; do not use SVG or add chart libraries.
- Preserve existing functionality, accessibility, desktop/mobile support, and reduced-motion behavior.
- Keep all chart values clearly identified as mock data.
- Do not restore or stage `index.html`, track `index.php` or `partials/`, commit, push, or change Git history.
- Limit product changes to `index.php`, `js/main.js`, and `css/styles.css`.

## Review Focus

- Current month and later months must not appear in the monthly chart; verify current-year chart shows only completed months.
- The annual selector must offer the current Buddhist year and previous two years; verify prior years have 12 distinct values and current year stops at the last completed month.
- Chart tooltip must work with pointer hover and keyboard focus and remain readable on narrow screens.
- Search glow must not replace the visible focus indicator and must respect reduced motion.
- At 1440px and 390px, page content must not cause horizontal overflow.

---

### Task 1: Reorder homepage sections and prepare chart markup

**Files:**
- Modify: `index.php`

**Interfaces:**
- Consumes: existing homepage sections and chart controls.
- Produces: news section before status section; chart container and year options retain existing IDs used by JavaScript.

- [x] Move only the existing news section before `#water-status` without changing its content.
- [x] Keep annual/monthly controls and accessible labels; supply Buddhist years 2567–2569 and identify the chart as mock data.
- [x] Check section order and ensure all existing IDs remain unique.

### Task 2: Add separate mock datasets and interactive chart rendering

**Files:**
- Modify: `js/main.js`

**Interfaces:**
- Consumes: `#period-monthly`, `#period-yearly`, `#usage-year`, `#usage-data`, and `#usage-period-status`.
- Produces: data-driven HTML bar elements with month, value, tooltip, keyboard focus, and selected-year behavior.

- [x] Store distinct 12-month mock values for 2567, 2568, and 2569 separately from rendering.
- [x] Render only completed months in the current year; render all 12 months for previous years.
- [x] Ensure monthly mode excludes the current month and later months; display month name and volume in each bar's tooltip/accessibility label.
- [x] Keep period button pressed states and year dropdown changes synchronized; show mock-data status text.
- [x] Check JavaScript syntax and exercise month/year changes, keyboard focus, and tooltip content.

### Task 3: Refine visual styles and responsive states

**Files:**
- Modify: `css/styles.css`

**Interfaces:**
- Consumes: existing design tokens, `.header-search`, `.card`, `.chart`, and `.chart-column` conventions.
- Produces: restrained animated search glow, consistent card depth, chart hover/focus transitions, and mobile-safe tooltips.

- [x] Add soft blue/cyan search reflection and glow while retaining the existing high-visibility focus outline.
- [x] Add subtle page/section background depth and consistent card hover states using existing palette.
- [x] Style chart bars with CSS transitions, clear hover/focus visual focus, and positioned tooltips.
- [x] Respect `prefers-reduced-motion` and existing breakpoints.
- [x] Check computed layout at 1440px and 390px for horizontal overflow.

### Task 4: Verify the delivered homepage

**Files:**
- Verify: `index.php`, `js/main.js`, `css/styles.css`

- [x] Run `php -l index.php` and `node --check js/main.js`.
- [x] Use an available browser to check 1440px and 390px layouts, console/network errors, search, year dropdown, and chart hover/focus interactions.
- [x] Review `git diff` and `git status --short`; confirm only the three scoped product files changed and the pre-existing Git states remain intact.
- [x] Stop after reporting results for Homepage Review & Approval; do not commit or push.
