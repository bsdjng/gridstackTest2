<flux:main>
    <div class="relative mx-auto border-default bg-base border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl">
        <div class="w-[148px] h-[18px] bg-base top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute"></div>
        <div class="h-[46px] w-[3px] bg-base absolute -start-[17px] top-[124px] rounded-s-lg"></div>
        <div class="h-[46px] w-[3px] bg-base absolute -start-[17px] top-[178px] rounded-s-lg"></div>
        <div class="h-[64px] w-[3px] bg-base absolute -end-[17px] top-[142px] rounded-e-lg"></div>
        <div class="rounded-[1.5rem] overflow-hidden w-full h-full p-2 grid grid-cols-5 grid-rows-8 gap-2">
            @foreach($this->cells as $cell)
                <flux:card
                    size="sm"
                    class="p-1! w-full h-full"
                    style="
                        grid-column-start: {{ ($cell->x_pos + 1) }};
                        grid-column-end: {{ ($cell->x_pos + 1) + $cell->width }};
                        grid-row-start: {{ ($cell->y_pos + 1) }};
                        grid-row-end: {{ ($cell->y_pos + 1) + $cell->height }};"
                >
                    @if($cell->show_name)
                        <flux:text size="sm">{{ $cell->storageRoom->name }}</flux:text>
                    @endif
                </flux:card>
            @endforeach
        </div>
    </div>
</flux:main>
