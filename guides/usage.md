---
name: usage
---

## About Usage

We built Fluxtor to work out of the box with typical Laravel apps no big JavaScript frameworks required. Just Blade, Alpine, and optionally Livewire.

But to make the most of it, we follow a small pattern that lets our components work smoothly in both Livewire and plain Blade. Once you get the idea, it’s super flexible.



### Using with Livewire

All dynamic components in Fluxtor work with Livewire the same way you'd expect. Just bind your property using `wire:model`, like you normally do:

```html
<x-ui.key-value 
    wire:model="configurations" 
/>
```

That’s it. Livewire will pick up the value, and it’ll react like any other input field.



### Using with Raw Blade

Now if you're just using Blade + AlpineJS (no Livewire), we’ve still got you covered.

The pattern we suggest is binding the state using `x-model`, then syncing it through a hidden input like this:

```html
<x-ui.key-value 
    x-model="configurations" 
/>

<input type="hidden" name="configurations" x-model="configurations" />
<!-- Now you’ll get the value in your controller as usual -->
```

So whether you’re submitting with a form or capturing it via JS, you’re good.



### A Bit of Theory

Under the hood, Fluxtor components expose a `state` a global value that needs to be either synced with Livewire or sent through a request. That’s where `x-model` and `wire:model` come into play.

You can use either of them depending on your setup, and things will just work. But how?

Well, shoutout to Caleb Porzio who introduced [`x-modelable`](https://alpinejs.dev/directives/modelable) an underrated gem in Alpine. It makes it super easy to sync component state with an outside model.

Here’s a quick refresher:

```html
<div x-data="{ number: 5 }">
    <!-- `count` is exposed and bound to `number` -->
    <div x-data="{ count: 0 }" x-modelable="count" x-model="number">
        <button @click="count++">Increment</button>
    </div>

    Number: <span x-text="number"></span>
</div>
```

But sometimes that’s just not enough especially when you want more control over the shape of the state or need two-way syncing with extra logic. So we go a step further and bind the state manually inside the component.



### Fun Fact About Livewire

Dig into the Livewire source code and you’ll see this:  
`wire:model` is basically just a powered-up `x-model`. Under the hood, it uses Alpine’s `bind()` utility.  
You can see that in action [here](https://github.com/livewire/livewire/blob/main/js/directives/wire-model.js#L50).

So yeah, next time you use `wire:model`, know that it’s just `x-model` with some Laravel seasoning.

And guess what? When Alpine sees an element with `x-model`, it adds a `_x_model` property to the element, which you can access and modify directly even if it’s not a form input [read this](https://alpinejs.dev/directives/model#programmatic%20access).

Here's how:

- Get the value: `$el._x_model.get()`
- Set the value: `$el._x_model.set(newValue)`

Neat, right?



### Real Example

Let’s take our [Key Value](/docs/key-value) component as a real-world example. Here's how we wire the state inside it:

```js
<div
    x-data="{
        state: [],
        ...
        init() {
            this.$nextTick(() => {
                this.state = this.$root._x_model?.get() ?? []
                ...
            })

            Alpine.effect(() => {
                this.$root?._x_model?.set(this.state)
            })
        },
        ...
    }"
>
```

So what’s going on?

- We check if there’s an existing external state to pull in
- We assign it to our internal `state`
- Then anytime `state` changes, we push it back to the external model (`x-model` or `wire:model`) using `set()`

This pattern gives us full control without breaking Livewire or Blade compatibility. It’s how we make components that are truly reusable, reactive, and enjoyable to work with no matter your setup.
