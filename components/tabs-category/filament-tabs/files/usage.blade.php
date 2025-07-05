
<div class="max-w-2xl mx-auto">
    <x-tabs class="border border-b border-gray-200 dark:bg-transparent bg-white rounded-xl dark:border-white/10 overflow-hidden">
        <x-slot:items class="border-b dark:border-white/15 dark:bg-transparent bg-white border-gray-200 px-3">
            @foreach (['Reads the Docs', 'get the Code','an other tab'] as $tabItem)
                <x-tabs.item 
                    class=" my-2 rounded-lg group flex items-center gap-x-2  px-3 py-2 text-sm font-semibold outline-none transition duration-75"
                    activeClasses="dark:bg-white/6 bg-gray-100 dark:text-violet-400 text-violet-500"
                    >
                    {{ str()->title($tabItem) }}
                </x-tabs.item>
            @endforeach
        </x-slot:items>
    
        <x-slot:panels
            class="dark:text-gray-400 text-gray-800 p-3 dark:bg-transparent bg-white">
            <x-tabs.panel class="rounded-lg">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem culpa aspernatur vel fugit
                        magni tenetur sapiente reiciendis eveniet. Deleniti, esse! Rem a nihil sequi numquam quaerat culpa
                        repudiandae molestiae mollitia nemo accusamus, veritatis ex, magnam architecto inventore harum vel
                        voluptas illum autem qui cumque sed animi totam aspernatur! Provident nesciunt recusandae,
                        consequatur perspiciatis unde culpa maxime illum numquam at rem vero adipisci in saepe tempore fuga
                        aliquid reiciendis nisi vel pariatur nam corrupti nihil, molestiae nemo. Aliquid, quidem! Ipsa
                        ducimus officia quia cum placeat quae accusantium nobis commodi repudiandae sed. Perferendis minus
                        repellendus qui iure velit sequi nulla quidem nostrum!
            </x-tabs.panel>
            <x-tabs.panel>
                tab 2 contents ipsum dolor sit amet, consectetur adipisicing elit. Ut vel doloribus repellat nemo cumque et rerum
                omnis, autem culpa repellendus, illo consequuntur nostrum? Dolore eaque obcaecati maiores eius repudiandae
                nobis, nam perferendis laboriosam, officia amet quo, doloremque ab reprehenderit! Quia error, fugit sunt,
                sapiente, qui libero minima harum adipisci laudantium ad blanditiis quaerat animi beatae consectetur.
                Voluptatem iste esse cumque, aperiam quos repellat harum. Vel veniam id blanditiis animi exercitationem quia
                delectus ducimus esse illo laborum, reprehenderit quos quo eius repudiandae illum aperiam corporis?
                Mollitia, rerum reiciendis optio molestias dolorum aut autem quae voluptatibus. Fuga architecto atque
                molestiae quia velit?
            </x-tabs.panel>
            <x-tabs.panel>
                tab 3 contents  ipsum dolor sit amet, consectetur adipisicing elit. Ut vel doloribus repellat nemo cumque et rerum
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
    
</div>
