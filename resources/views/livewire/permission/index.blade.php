<div wire:ignore.self class="w-100" style="height: 100%">

    @if ($currentPage == PAGECREATFORM)
        @include("livewire.permission.ajout")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.permission.edit")
    @endif

    @if ($currentPage == PAGELIST)
        @include("livewire.permission.list")
    @endif
    
</div>