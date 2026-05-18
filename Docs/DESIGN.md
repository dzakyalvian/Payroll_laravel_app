# DESIGN SYSTEM

## Design Philosophy

- Modern enterprise dashboard
- Professional payroll interface
- Clean minimal UI
- Data-focused layout
- Calm and premium appearance
- Dark mode first
- Consistent spacing and typography

---

# UI Inspiration

This project design system is inspired by Flux UI.

Design characteristics:
- clean enterprise layout
- soft borders instead of heavy shadows
- spacious sidebar navigation
- minimal topbar
- modern SaaS dashboard
- compact but readable tables
- subtle dark mode
- professional spacing rhythm

Avoid:
- overuse of gradients
- glassmorphism
- excessive animations
- heavy shadows
- colorful UI noise

Preferred UI style:
- border-driven hierarchy
- muted surfaces
- semantic colors
- soft contrast
- clean typography
---

## Layout Rules

- Use responsive layouts
- Use 12-column grid when needed
- Use gap-6 for section spacing
- Use max-width containers
- Avoid excessive nesting

---

## COLOR SYSTEM RULES

This project uses a semantic token-based color system.

Do not use raw Tailwind colors directly.

Forbidden:
- bg-yellow-500
- bg-zinc-900
- text-red-400
- border-gray-700

Always use semantic tokens:

- bg-background
- bg-card
- text-foreground
- text-muted-foreground
- bg-primary
- bg-secondary
- border-border
- bg-accent

Charts must use:
- chart-1
- chart-2
- chart-3
- chart-4
- chart-5

---

## Forbidden Colors

Do not use random Tailwind colors such as:

- bg-blue-500
- text-red-500
- bg-green-400

Always use semantic design tokens.

---

## Typography Rules

### Page Title

- text-2xl font-semibold tracking-tightx

### Section Title

- text-lg font-medium

### Body Text

- text-sm text-muted-foreground

### Small 

- text-xs text-muted-foreground


## Spacing Rules

- page spacing = p-6
- section gap = gap-6
- card padding = p-6
- small padding = p-4

## Card Rules

- rounded-xl
- border
- subtle shadow
- muted background
- consistent padding

---

## Table Rules

- compact spacing
- sticky header
- hover state
- zebra rows if needed
- responsive overflow

---

## Form Rules

Inputs must:

- have consistent height
- use muted backgrounds
- have clear focus state
- show validation clearly

---

## Button Rules

Variants:

- primary
- secondary
- ghost
- destructive

Buttons must:

- use consistent spacing
- have subtle transition
- use semantic colors only

---

## Sidebar Rules

- dark sidebar
- active item highlighted
- collapsible on mobile
- clean icon alignment

---

## Modal Rules

- centered layout
- overlay blur
- rounded-xl
- consistent max width

---

## Chart Rules

Use only:

- chart-1
- chart-2
- chart-3
- chart-4
- chart-5

Avoid random chart colors.

---

## Animation Rules

Allowed:

- subtle transitions
- transition-all duration-200
- opacity transitions

Forbidden:

- flashy animation
- excessive motion
- distracting effects

---

## Dark Mode Rules

- Dark mode is primary
- Light mode is secondary
- Use semantic tokens only
- Maintain readability and contrast

---

## Component Rules

Always use reusable Blade components.

Cards:
- rounded-xl
- border border-border
- bg-card
- minimal shadow

Sidebar:
- spacious navigation
- subtle active states
- icon + label layout
- muted inactive items

Tables:
- compact rows
- subtle separators
- muted headers
- hover states only

Topbar:
- minimal
- clean
- utility-focused

Preferred:

- <x-ui.card>
- <x-ui.button>
- <x-ui.input>
- <x-ui.table>
- <x-ui.badge>
- <x-ui.modal>
- <x-ui.stat-card>

Avoid duplicated Tailwind styling. high quality dashboard UI