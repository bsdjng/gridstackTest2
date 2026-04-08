@props([
    'id',
    'cellKey',
    'name',
    'edit' => true,
])


<div
    class="p-2!"
    id="{{ $id }}"
    data-cell-key="{{ $cellKey }}"
    x-data="{
        showName: $wire.entangle('options.{{ $cellKey }}.show_name'),
        showId: false,
        init() {
            $watch('showName', value => $el.gridstackNode.showName = value)
        }
    }"
>
    <flux:card
        size="sm"
        @class([
            'h-full w-full relative group',
            'hover:bg-zinc-50 dark:hover:bg-zinc-700 hover:cursor-move' => $edit,
        ])
    >
        <flux:heading class="flex items-center gap-2">
            <span :class="{'opacity-5': !showName}">{{ $name }}</span>
        </flux:heading>

        @if($edit)
            <flux:button
                name="arrow-up-right"
                class="text-zinc-400 absolute! top-2 right-2 opacity-0 group-hover:opacity-100 [#sideGrid_&]:hidden!"
                variant="subtle"
                icon="cog"
                size="xs"
                wire:click="$set('selectedCell', '{{ $cellKey }}');"
                x-on:click="$flux.modal('edit-cell').show()"
                inset
            />
        @endif
    </flux:card>
</div>
