---
name: 'themes'
---

# Theming System

Sheaf UI looks great out of the box, but your project isn’t “just another gray website.” Maybe you want bold and colorful, maybe minimal and sharp. Whatever your style, the theming system lets you align every component with your brand in minutes.

---

## Core Idea

Sheaf UI themes are powered by **two main color families** and **two radius controls**.
Everything else flows from there.

### Color Roles

| Variable                  | Purpose                                                 |
| ------------------------- | ------------------------------------------------------- |
| `--color-primary`         | Your main brand color (buttons, links, active states).  |
| `--color-primary-content` | Slightly darker/lighter variant for better readability. |
| `--color-primary-fg`      | Text color that sits on top of primary backgrounds.     |

**Base color** covers neutral backgrounds, borders, and text.
**Primary color** handles interactive elements and brand accents.

---

## Setting Your Primary Colors

We use CSS variables so you can change the theme without touching component code.

```css
/* resources/css/app.css */
@theme {
    --color-primary: var(--color-neutral-800);
    --color-primary-content: var(--color-neutral-800);
    --color-primary-fg: var(--color-white);

    --radius-field: 0.25rem;
    --radius-box: 0.5rem;
}
```

---

## Dark Mode Support

Dark mode is built in. Override your variables inside a `.dark` selector:

```css
@layer theme {
    .dark {
        --color-primary: var(--color-white) !important ;
        --color-primary-content: var(--color-white) !important;
        --color-primary-fg:  var(--color-neutral-800) !important;
    }
}
```

Switch your HTML’s class to `.dark` and everything adapts automatically.

---

## Controlling Roundness

Two variables control all corner radii:

| Variable         | Affects                         |
| ---------------- | ------------------------------- |
| `--radius-field` | Inputs and small elements       |
| `--radius-box`   | Cards, modals, large containers |

Examples:

```css
/* Soft and friendly */
@theme {
    --radius-field: 0.5rem;
    --radius-box: 1rem;
}

/* Sharp and minimal */
@theme {
    --radius-field: 0rem;
    --radius-box: 0rem;
}
```

---

## Example: Switching to Blue

```css
@theme {
    --color-primary: var(--color-blue-600);
    --color-primary-content: var(--color-blue-700);
    --color-primary-fg: var(--color-white);
}

@layer theme {
    .dark {
        --color-primary: var(--color-white) !important ;
        --color-primary-content: var(--color-white) !important;
        --color-primary-fg:  var(--color-neutral-800) !important;
    }
}
```

---

## Changing the Base Color Family

If you want to replace the entire neutral palette (e.g., switch from `neutral` to `slate`):

```css
@theme {
    --color-neutral-50: var(--color-slate-50);
    --color-neutral-100: var(--color-slate-100);
    --color-neutral-200: var(--color-slate-200);
    --color-neutral-300: var(--color-slate-300);
    --color-neutral-400: var(--color-slate-400);
    --color-neutral-500: var(--color-slate-500);
    --color-neutral-600: var(--color-slate-600);
    --color-neutral-700: var(--color-slate-700);
    --color-neutral-800: var(--color-slate-800);
    --color-neutral-900: var(--color-slate-900);
    --color-neutral-950: var(--color-slate-950);
}
```

This lets you keep using `text-neutral-800` while the underlying tone changes project-wide.

---

## Using Your Theme in Components

```html
<button class="bg-primary text-primary-fg">
    Branded button
</button>
```

These utility classes map directly to your theme variables.

---

## Adding Extra Semantic Colors

```css
@theme {
    --color-success: var(--color-green-600);
    --color-error: var(--color-red-600);
    --color-warning: var(--color-yellow-600);
}
```

Now you can do:

```html
<span class="text-success">Success</span>
```

---

## Component-Specific Tweaks

If you need global overrides for specific Sheaf UI components, target them with data attributes.
(You own the code — for deeper changes, edit the component directly.)

```css
/* Make all buttons extra rounded */
[data-slot="button"] {
    border-radius: var(--radius-box);
}

/* Give cards a custom border */
[data-slot="card"] {
    border: 2px solid var(--color-primary);
}

/* Style icons */
[data-slot="icon"] {
    @apply text-neutral-300;
}
```

---

## Quick Reference: Theme Variables

| Variable                                     | Description                              |
| -------------------------------------------- | ---------------------------------------- |
| `--color-primary`                            | Main brand color                         |
| `--color-primary-content`                    | Readable variant of primary              |
| `--color-primary-fg`                         | Foreground color for primary backgrounds |
| `--radius-field`                             | Rounding for inputs                      |
| `--radius-box`                               | Rounding for larger elements             |
| `--color-neutral-50` → `--color-neutral-950` | Neutral palette shades                   |

---

Now you have a theme system that’s **fast to change**, **consistent across components**, and **ready for both light and dark modes**.