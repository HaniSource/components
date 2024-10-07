<x-tabs class="py-4">
    <x-slot:items>
        @foreach (['Reads the Docs', 'get the Code'] as $tabItem)
            <x-tabs.item class="py-2.5 font-semibold text-slate-400"
                activeClasses="bg-white/[0.03]  border-t border-l border-r    border-white/10 border-b border-b-[#02031C]/80 !z-30">
                {{ str()->title($tabItem) }}
            </x-tabs.item>
        @endforeach
    </x-slot:items>

    <x-slot:panels
        x-bind:class="{
            'rounded-tl-lg': !isActive($refs.tablist.firstElementChild.firstElementChild.id),
            'rounded-tr-lg rounded-bl-lg rounded-br-lg border bg-white/[0.03] border-white/10 text-gray-400': true
        }">
        <x-tabs.panel>

            <div class="mx-auto max-w-3xl px-2">
                <div
                    class="prose max-w-none dark:prose-invert prose-pre:bg-white/5 dark:prose-code:rounded dark:prose-code:bg-white/20">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima dicta fuga quo omnis modi illo, delectus eos natus, sint cum porro commodi? Iste perspiciatis molestiae voluptate obcaecati perferendis. Mollitia, unde. Ex illum autem quo commodi natus amet ad ut error, eum fuga eos, quod modi, placeat sequi unde libero corporis suscipit cumque quidem delectus veritatis dolores saepe sed. Enim eum iure obcaecati, eos ullam tenetur. Neque ab fugiat, molestias autem ullam fugit, architecto dicta iusto eum consequuntur voluptas deleniti laborum voluptatem ipsum, quibusdam iure eligendi rem itaque reiciendis! Cupiditate quasi minima beatae, sequi consectetur sit dolor nemo voluptatem. Aperiam, labore.
                </div>
            </div>
            
        </x-tabs.panel>
        <x-tabs.panel>
            Lorem2 ipsum dolor sit amet, consectetur adipisicing elit. Ut vel doloribus repellat nemo cumque et rerum omnis, autem culpa repellendus, illo consequuntur nostrum? Dolore eaque obcaecati maiores eius repudiandae nobis, nam perferendis laboriosam, officia amet quo, doloremque ab reprehenderit! Quia error, fugit sunt, sapiente, qui libero minima harum adipisci laudantium ad blanditiis quaerat animi beatae consectetur. Voluptatem iste esse cumque, aperiam quos repellat harum. Vel veniam id blanditiis animi exercitationem quia delectus ducimus esse illo laborum, reprehenderit quos quo eius repudiandae illum aperiam corporis? Mollitia, rerum reiciendis optio molestias dolorum aut autem quae voluptatibus. Fuga architecto atque molestiae quia velit?
        </x-tabs.panel>
    </x-slot:panels>
</x-tabs>