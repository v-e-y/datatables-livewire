<div class="space-y-4">
    @foreach($rules as $index => $rule)
        @php $key = $parentIndex !== null ? $parentIndex . '.' . $index : $index; @endphp
        <div wire:key="{{ $key }}">
            @if($rule['type'] === 'rule')
                @include('datatables::complex-query-rule', ['parentIndex' => $key, 'rule' => $rule])
            @elseif($rule['type'] === 'group')
                <div x-data="{
                    key: '{{ collect(explode('.', $key))->join(".content.") . ".content" }}',
                    source: () => document.querySelector('[dragging]'),
                    dragstart: (e, key) => {
                        e.target.setAttribute('dragging', key)
                        e.target.classList.add('bg-opacity-20', '')
                    },
                    dragend: (e) => {
                        e.target.removeAttribute('dragging')
                        e.target.classList.remove('bg-opacity-20', '')
                    },
                    dragenter(e) {
                        if (e.target.closest('[drag-target]') !== this.source().closest('[drag-target]')) {
                            console.log(this.$refs.placeholder)
                            this.$refs.placeholder.appendChild(this.source())
                        }
                    },
                    drop(e) {
                        $wire.call('moveRule', this.source().getAttribute('dragging'), this.key)
                    },
                }" drag-target
                    x-on:dragenter.prevent="dragenter"
                    x-on:dragleave.prevent
                    x-on:dragover.prevent
                    x-on:drop="drop"
                    class="p-4 space-y-4 bg-blue-500 bg-opacity-10 rounded-lg text-gray-{{ strlen($parentIndex) > 6 ? 1 : 9 }}00 border border-blue-400"
                >
                    <span class="d-flex justify-content-center space-x-4">
                        <button wire:click="addRule('{{ collect(explode('.', $key))->join(".content.") . ".content" }}')" class="d-flex align-items-center px-3 py-2 border border-blue-400 text-primary  text-uppercase  ">ADD RULE</button>
                        <button wire:click="addGroup('{{ collect(explode('.', $key))->join(".content.") . ".content" }}')" class="d-flex align-items-center px-3 py-2 border border-blue-400 text-primary  text-uppercase  ">ADD GROUP</button>
                    </span>
                    <div class="block sm:d-flex align-items-center">
                        <div class="d-flex justify-content-center sm:block">
                            @if(count($rule['content']) > 1)
                                <div class="mr-8">
                                    <label class="block text-uppercase font-bold py-1 rounded d-flex justify-content-between">Logic</label>
                                    <select
                                        wire:model="rules.{{ collect(explode('.', $key))->join(".content.") }}.logic"
                                        class="w-24  block border-gray-300 shadow-sm "
                                    >
                                        <option value="and">AND</option>
                                        <option value="or">OR</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                        <div x-ref="placeholder" class="flex-grow space-y-4">
                            <div>
                                @include('datatables::complex-query-group', [
                                    'parentIndex' => $key,
                                    'rules' => $rule['content'],
                                    'logic' => $rule['logic']
                                ])
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        @unless($key === 0)
                            <button wire:click="removeRule('{{ collect(explode('.', $key))->join(".content.") . ".content" }}')" class="px-3 py-2 rounded bg-red-600 text-white"><x-icons.trash /></button>
                        @endunless
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>
