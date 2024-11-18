<div class="mx-auto max-w-2xl">
    <x-tabs
        class="dark:bg-transparent  mx-auto max-w-full gap-x-1 overflow-x-auto rounded-xl p-2">
        <x-slot:items class="dark:bg-white/5 mx-auto  w-fit justify-center rounded-lg bg-white px-3">
            @foreach (['Reads the Docs', 'get the Code', 'an other tab'] as $tabItem)
                <x-tabs.item
                    class="group mt-2 mb-2 flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-semibold outline-none transition duration-75"
                    activeClasses="dark:bg-white/5 text-violet-500 bg-gray-100">
                    {{ str()->title($tabItem) }}
                </x-tabs.item>
            @endforeach
        </x-slot:items>

        <x-slot:panels class="rounded-lg dark:bg-transparent bg-white p-3 dark:text-gray-400 text-gray-800">
            <x-tabs.panel>
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
                tab 2 contents ipsum dolor sit amet, consectetur adipisicing elit. Ut vel doloribus repellat nemo cumque
                et rerum
                omnis, autem culpa repellendus, illo consequuntur nostrum? Dolore eaque obcaecati maiores eius
                repudiandae
                nobis, nam perferendis laboriosam, officia amet quo, doloremque ab reprehenderit! Quia error, fugit
                sunt,
                sapiente, qui libero minima harum adipisci laudantium ad blanditiis quaerat animi beatae consectetur.
                Voluptatem iste esse cumque, aperiam quos repellat harum. Vel veniam id blanditiis animi exercitationem
                quia
                delectus ducimus esse illo laborum, reprehenderit quos quo eius repudiandae illum aperiam corporis?
                Mollitia, rerum reiciendis optio molestias dolorum aut autem quae voluptatibus. Fuga architecto atque
                molestiae quia velit?
            </x-tabs.panel>
            <x-tabs.panel>
                tab 3 contents ipsum dolor sit amet, consectetur adipisicing elit. Ut vel doloribus repellat nemo cumque
                et rerum
                omnis, autem culpa repellendus, illo consequuntur nostrum? Dolore eaque obcaecati maiores eius
                repudiandae
                nobis, nam perferendis laboriosam, officia amet quo, doloremque ab reprehenderit! Quia error, fugit
                sunt,
                sapiente, qui libero minima harum adipisci laudantium ad blanditiis quaerat animi beatae consectetur.
                Voluptatem iste esse cumque, aperiam quos repellat harum. Vel veniam id blanditiis animi exercitationem
                quia
                delectus ducimus esse illo laborum, reprehenderit quos quo eius repudiandae illum aperiam corporis?
                Mollitia, rerum reiciendis optio molestias dolorum aut autem quae voluptatibus. Fuga architecto atque
                molestiae quia velit?
            </x-tabs.panel>
        </x-slot:panels>
    </x-tabs>
</div>
