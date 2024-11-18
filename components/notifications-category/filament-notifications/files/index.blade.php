<div
    x-data="{
        toasts: [],
        typeMap: {
            info: {
                textColor: 'text-gray-400',
                icon: '!',
                srLabel: 'Information',
                background:'bg-gray-500/15',
                borderColor:'border-gray-500/55'
            },
            success: {
                textColor: 'text-green-600',
                icon: '&check;',
                srLabel: 'Success',
                background:'bg-green-500/15',
                borderColor:'border-green-500/55'
            },
            error: {
                textColor: 'text-red-600',
                icon: '&times;',
                srLabel: 'Error',
                background:'bg-red-500/15',
                borderColor:'border-red-500/55'
            }
        },
        notify(e) {
            this.toasts.push({
                id: e.timeStamp,
                type: e.detail.type,
                content: e.detail.content,
                duration: e.detail.duration || 2000
            })
        },
        remove(toast) {
            this.toasts = this.toasts.filter(i => i.id !== toast.id)
        }
    }"
    x-on:notify.window="notify($event)"
    class="fixed bottom-0 right-0 flex w-full max-w-xs flex-col space-y-4 pr-4 pb-4 sm:justify-start"
    role="status"
    aria-live="polite"
>
    <!-- Notification -->
    <template 
        x-for="toast in toasts" 
        x-bind:key="toast.id"
    >
        <div
            x-data="{
                show: false,
                init() {
                    this.$nextTick(() => this.show = true)
                    setTimeout(() => this.fadeOut(), toast.duration)
                },
                fadeOut() {
                    this.show = false
                    setTimeout(() => this.remove(toast), 500)
                }
            }"
            x-show="show"
            x-transition.duration.500ms
            x-bind:class="[
                'pointer-events-auto relative w-full max-w-sm rounded-xl border dark:border-white/15 border-gray-200 py-4 pl-6 pr-4 shadow-lg',
                typeMap[toast.type].background
            ]"
        >
            <div class="flex items-start">
                <div class="flex-shrink-0" x-bind:class="typeMap[toast.type].textColor">
                    <div aria-hidden="true" class="flex size-6 items-center justify-center rounded-full border-2 font-bold text-xl pb-1 leading-none" x-bind:class="typeMap[toast.type].borderColor" x-html="typeMap[toast.type].icon"></div>
                    <span class="sr-only" x-text="typeMap[toast.type].srLabel"></span>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p x-text="toast.content" class="text-sm font-medium leading-5 text-gray-900 dark:text-white"></p>
                </div>
                <div class="ml-4 flex flex-shrink-0">
                    <button x-on:click="fadeOut()" type="button" class="inline-flex text-gray-400">
                        <svg aria-hidden class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close toast</span>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
