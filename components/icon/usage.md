---
name: icon
---

## Introduction 

The icon component designed to be headless and easy to use, it uses two providers under the hood [heroicons](https://heroicons.com) and [phosphor icons](https://phosphoricons.com)

> you need to install the provider's blade wrappers you may need and we will use that to give a convinient way of using icons inside your project.

the [WireUi Project](https://wireui.com) did a nice work of wrapping these two icons providers 

to use heroicons you need to install the wuireui's wrapper package
## Installation 

```shell
composer require wireui/heroicons
```

for using phosphor icon you need to install the wuireui's wrapper package

```shell
composer require wireui/phosphoricons
```

> once you have the provider(s) of choice installed now you can use it as shown above

## Customization 
### Variants
@blade
<x-demo>
    <x-components::ui.icon name="academic-cap"  class="text-white"/> 
    <x-components::ui.icon name="academic-cap" variant="solid" class="text-white"/>
    <x-components::ui.icon name="academic-cap" variant="mini" class="text-white"/>
    <x-components::ui.icon name="academic-cap" variant="micro" class="text-white"/>
</x-demo>
@endblade


```html
    <x-components::ui.icon name="academic-cap"  class="text-white"/> <!-- 24px, outline -->
    <x-components::ui.icon name="academic-cap" variant="solid" class="text-white"/> <!-- 24px, solid -->
    <x-components::ui.icon name="academic-cap" variant="mini" class="text-white"/> <!-- 20px, solid -->
    <x-components::ui.icon name="academic-cap" variant="micro" class="text-white"/> <!-- 16px, solid -->
```

### Sizes

@blade
<x-demo>
    <x-components::ui.icon name="academic-cap"  class="size-12"/> 
    <x-components::ui.icon name="academic-cap" variant="solid" class="text-white"/>
    <x-components::ui.icon name="academic-cap" variant="mini" class="text-white"/>
    <x-components::ui.icon name="academic-cap" variant="micro" class="text-white"/>
</x-demo>
@endblade

