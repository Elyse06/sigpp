<div wire:ignore.self class="w-100" style="height: 100%">

    @if ($currentPage == PAGECREATFORM)
        @include("livewire.conge.ajout")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.conge.edit")
    @endif

    @if ($currentPage == PAGELIST)
        @include("livewire.conge.list")
    @endif
    
</div>