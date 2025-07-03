<x-tabs class="py-4">
    <x-slot:items>
        @foreach (['Reads the Docs', 'get the Code'] as $tabItem)
            <x-tabs.item class="py-2.5 font-semibold text-slate-400"
                activeClasses="bg-white/3  border-t border-l border-r    border-white/10 border-b border-b-[#02031C]/80 z-30!">
                {{ str()->title($tabItem) }}
            </x-tabs.item>
        @endforeach
    </x-slot:items>

    <x-slot:panels
        x-bind:class="{
            'rounded-tl-lg': !isActive($refs.tablist.firstElementChild.firstElementChild.id),
            'rounded-tr-lg rounded-bl-lg rounded-br-lg border bg-white/3 border-white/10 text-gray-400': true
        }">
        <x-tabs.panel>

            <div class="mx-auto max-w-3xl px-2">
                <div
                    class="prose max-w-none dark:prose-invert prose-pre:bg-white/5 dark:prose-code:rounded dark:prose-code:bg-white/20">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem culpa aspernatur vel fugit
                    magni tenetur sapiente reiciendis eveniet. Deleniti, esse! Rem a nihil sequi numquam quaerat culpa
                    repudiandae molestiae mollitia nemo accusamus, veritatis ex, magnam architecto inventore harum vel
                    voluptas illum autem qui cumque sed animi totam aspernatur! Provident nesciunt recusandae,
                    consequatur perspiciatis unde culpa maxime illum numquam at rem vero adipisci in saepe tempore fuga
                    aliquid reiciendis nisi vel pariatur nam corrupti nihil, molestiae nemo. Aliquid, quidem! Ipsa
                    ducimus officia quia cum placeat quae accusantium nobis commodi repudiandae sed. Perferendis minus
                    repellendus qui iure velit sequi nulla quidem nostrum!
                </div>
            </div>

        </x-tabs.panel>
        <x-tabs.panel>
            Lorem2 ipsum dolor sit amet, consectetur adipisicing elit. Ut vel doloribus repellat nemo cumque et rerum
            omnis, autem culpa repellendus, illo consequuntur nostrum? Dolore eaque obcaecati maiores eius repudiandae
            nobis, nam perferendis laboriosam, officia amet quo, doloremque ab reprehenderit! Quia error, fugit sunt,
            sapiente, qui libero minima harum adipisci laudantium ad blanditiis quaerat animi beatae consectetur.
            Voluptatem iste esse cumque, aperiam quos repellat harum. Vel veniam id blanditiis animi exercitationem quia
            delectus ducimus esse illo laborum, reprehenderit quos quo eius repudiandae illum aperiam corporis?
            Mollitia, rerum reiciendis optio molestias dolorum aut autem quae voluptatibus. Fuga architecto atque
            molestiae quia velit?
        </x-tabs.panel>
    </x-slot:panels>
</x-tabs>
