---
name: "fluxtor"
files:
  index: resources/views/components/password-toggle.blade.php
  usage: resources/views/usage.blade.php
---


# Revealable Password Component

Once upon a time in the land of web interfaces, there was a humble yet powerful component designed to solve a common user frustration—revealing and hiding passwords with ease. This component, known as the **Password Toggle**, offered users the ability to securely manage their input fields without hassle.

## The Journey Begins

Every great component starts with a purpose. The Password Toggle component was crafted to provide a seamless way to switch between masked and visible password inputs. By harnessing the magic of **Alpine.js**, it allowed users to click a simple button and reveal or hide their password as needed.

## The Inner Workings

Nestled within an elegant `div` wrapper, the Password Toggle component contained a secret mechanism driven by Alpine's reactive abilities. Let's take a look at its structure:

```html
<div
    x-data="{
        isShown: false,
        init(){
            $nextTick(()=>{
                this.inputElement = this.$el.querySelector('input[type=password]');
            })
        },
        toggle() {
            this.isShown = !this.isShown;
            if (this.inputElement) {
                this.inputElement.type = this.isShown ? 'text' : 'password';
            }
        }
    }"
    class="input-wrapper flex rounded-lg bg-white/5 shadow-sm ring-1 ring-gray-950/10 transition duration-75 focus-within:ring-2 focus-within:ring-violet-600 dark:ring-white/20 dark:focus-within:ring-violet-500">
    {{ $slot }}
    <div class="flex items-center gap-x-3 border-s pe-3 ps-3 text-gray-400 dark:border-white/10">
        <button type="button" x-show="!isShown" style="display: none" x-on:click.stop="toggle()" class="ml-2">
            <x-icon.eye />
        </button>
        <button type="button" x-show="isShown" style="display: none" x-on:click.stop="toggle()" class="ml-2">
            <x-icon.eye-slash />
        </button>
    </div>
</div>
```

## The Quest for Functionality

When the component is summoned (initialized), it embarks on a journey through the DOM, seeking the elusive `input[type=password]` field. Using Alpine's `init` function and the mystical `$nextTick` spell, it ensures that the input element is safely captured and ready for action.

### The Secrets Revealed

1. **Initialization:**  
   - As soon as the component is mounted, it searches for a password input field within its domain.
   - The `$nextTick` ensures the search is conducted only after the DOM is fully rendered.

2. **The Toggle Spell:**  
   - Clicking the toggle button reveals or conceals the password by dynamically changing the `type` attribute of the input field.
   - If `isShown` is `true`, the input transforms into plain text, and when `false`, it returns to its masked form.

3. **Dynamic Visibility:**  
   - Two enchanted buttons await their turn: an **eye icon** to reveal and an **eye-slash icon** to hide.
   - The `x-show` directive ensures only the relevant icon is visible based on the `isShown` state.

## A Practical Example

Here's how our Password Toggle component fits into a typical form:

```html
<form>
    <label for="password">Enter your password:</label>
    <x-password-toggle>
        <input type="password" id="password" class="input-field" placeholder="Your secure password" />
    </x-password-toggle>
</form>
```

## Conclusion

With its intuitive design and robust functionality, the Password Toggle component ensures a delightful user experience, granting users control over their passwords with a simple click.

And so, the Password Toggle component continues to serve security-conscious users across the kingdom of the web, making authentication journeys smoother and safer for all.

