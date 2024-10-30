---
name: 'Faqs accordion'
files:
    index: resources/views/components/accordion/index.blade.php
    item: resources/views/components/accordion/item.blade.php
    usage: resources/views/components/accordion/usage.blade.php
---


## Documentation

### Overviewn

This *Faqs Accordion* component is designed to present a series of items that can be expanded or collapsed, allowing users to view content in a compact manner.

### Component Structure
The accordion component is composed of two main files: 

1. **Main Container** (``accordion/index.blade.php``): Serves as the main wrapper for the accordion component. 
2. **Accordion Item** (``accordion/item.blade.php``): Manages individual items within the accordion. 

#### Accordion Container 

```html
<div 
    x-data="{ active: null }" 
    {{ $attributes->merge([
        'class'=>"w-full min-h-fit space-y-4 rounded-xl pb-4"
    ]) }}
>
    {{ $slot }}
</div>
```