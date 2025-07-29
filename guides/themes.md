---
name: 'themes'
---
# Theming System

We've meticulously designed Fluxtor to look great out of the box, however, every project has its own identity. You can choose from our hand-picked design tokens or build your own theme by customizing CSS variables.

## How Theming Works

There are essentially two main colors in a Fluxtor project: the **base color** and the **primary color**.

The base color is the color of the majority of your application's content. It's used for things like text, backgrounds, borders, etc.

The primary color is the color of your main action buttons and other interactive elements in your application.

Fluxtor ships with "neutral" as the default base color, but you are free to use any shade of gray you'd like.

## Primary Color System

Under the hood, Fluxtor uses CSS variables for its primary colors. This means that you can change the primary color to any color you'd like.

Here's how you define your primary color palette:

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

You'll notice Fluxtor uses three different hues in both light mode and dark mode for its primary color palette. Here are descriptions of each:

| Variable | Description |
|----------|-------------|
| `--color-primary` | The main primary color used as the background for primary buttons |
| `--color-primary-content` | A (typically) darker hue used for text content because it's more readable |
| `--color-primary-fg` | The color of (typically) text content on top of a primary colored background |

### Dark Mode Support

For dark mode, you simply redefine these variables in the `.dark` context:

```css
@layer theme {
    .dark {
        --color-primary: var(--color-white);
        --color-primary-content: var(--color-white);
        --color-primary-fg: var(--color-neutral-800);
    }
}
```

## Radius Variables

We've also included radius variables to control the "roundness" of your interface:

- `--radius-field` - Applied to form inputs and small interactive elements
- `--radius-box` - Applied to cards, panels, and larger containers

Want a softer, more modern feel? Increase these values:

```css
@theme {
    --radius-field: 0.5rem;
    --radius-box: 1rem;
}
```

Prefer sharp, professional edges? Set them to zero:

```css
@theme {
    --radius-field: 0rem;
    --radius-box: 0rem;
}
```

## Changing Your Primary Color

Let's say you want to use blue as your primary color instead of the default neutral. Here's how:

```css
/* resources/css/app.css */
@theme {
    --color-primary: var(--color-blue-600);
    --color-primary-content: var(--color-blue-700);
    --color-primary-fg: var(--color-white);
}

@layer theme {
    .dark {
        --color-primary: var(--color-blue-400);
        --color-primary-content: var(--color-blue-300);
        --color-primary-fg: var(--color-neutral-900);
    }
}
```

Now all your buttons, active states, and primary elements will use blue instead of neutral.

## Changing Your Base Color

Because neutral is used throughout Fluxtor's source code, you will need to redefine it in your CSS file if you'd like to use a different base color.

Here is an example of redefining "neutral" to "slate" in your CSS file:

```css
/* resources/css/app.css */
/* Re-assign Fluxtor's gray of choice... */
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

Now, Fluxtor will use "slate" as the base color instead of "neutral", and you can use "slate" inside your application utilities like you normally would:

```html
<x-ui.text class="text-slate-800 dark:text-white">...</x-ui.text>
```

## Using Your Theme Colors
 you can use utility classes such as:

```html
<button class="bg-primary text-primary-fg">
    Click me   
</button>
```

## Advanced Customization

### Adding More Colors

You can extend the system with additional semantic colors:



### Component-Specific Styling

Target specific components using data-slot attributes:

```css
/* Make all buttons extra rounded */
[data-slot="button"] {
    border-radius: var(--radius-box);
}

/* Custom card styling */
[data-slot="card"] {
    border: 2px solid var(--color-primary);
}
```