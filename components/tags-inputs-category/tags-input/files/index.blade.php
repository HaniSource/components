<div
    x-data="{
        newTag: '',
        tags:[],
        splitKeys: ' ',
        createTag: function () {
            this.newTag = this.newTag.trim()

            if (this.newTag === '') {
                return
            }

            if (this.tags.includes(this.newTag)) {
                this.newTag = ''
                return
            }

            this.tags.push(this.newTag)
            {{--  --}}
            this.newTag = ''
        },

        deleteTag: function (tagToDelete) {
            this.tags = this.tags.filter((tag) => tag !== tagToDelete)
        },
        input: {
            ['x-on:blur']: 'createTag()',
            ['x-model']: 'newTag',
            ['x-on:keydown'](event) {
                if (['Enter', ...this.splitKeys].includes(event.key)) {
                    event.preventDefault()
                    event.stopPropagation()

                    this.createTag()
                }
            },
            ['x-on:paste']() {
                this.$nextTick(() => {
                    if (this.splitKeys.length === 0) {
                        this.createTag()

                        return
                    }

                    const pattern = this.splitKeys
                        .map((key) =>
                            key.replace(/[/\-\\^$*+?.()|[\]{}]/g, '\\$&'),
                        )
                        .join('|')

                    this.newTag
                        .split(new RegExp(pattern, 'g'))
                        .forEach((tag) => {
                            this.newTag = tag

                            this.createTag()
                        })
                })
            },
        },
    }"
    x-modelable="tags"
    {{  $attributes->whereStartsWith('wire:model') }}
>
    <div {{ $attributes
        ->whereDoesntStartWith('wire:model')
        ->merge(['class'=>"rounded-lg bg-white/5 shadow-sm ring-1 ring-gray-950/10 transition duration-75 focus-within:ring-2 focus-within:ring-violet-600 dark:ring-white/20 dark:focus-within:ring-violet-500"]) }} >
        <input 
            type="text" 
            class="input block w-full border-none outline-none py-1.5 text-base text-gray-950 transition bg-transparent duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500  dark:text-white dark:placeholder:text-gray-500"
            x-bind="input"
        >
        <div wire:ignore class="block">
            <template x-cloak x-if="tags?.length">
                <div
                    @class([
                        'flex w-full flex-wrap gap-1.5 p-2',
                        'border-t border-t-gray-200 dark:border-t-white/10',
                    ])
                >
                    <template
                        x-for="(tag, index) in tags"
                        x-bind:key="`${tag}-${index}`"
                        class="hidden"
                    >
                        <div
                            class="bg-violet-500/15 text-violet-800 text-xs font-medium  px-2.5 py-0.5 rounded dark:bg-white/5 dark:text-violet-400 border border-violet-500! dark:border-violet-400"
                        >
                            <span
                                x-text="tag"
                                class="select-none text-start"
                            ></span>
                            <button
                                type="button"
                                x-on:click="deleteTag(tag)"
                            >&times;</button>
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </div>
</div>