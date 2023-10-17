<div wire:ignore.self class="w-100" style="height: 100%">

    @if ($currentPage == PAGECREATFORM)
        @include("livewire.sortie.ajout")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.sortie.edit")
    @endif

    @if ($currentPage == PAGELIST)
        @include("livewire.sortie.list")
    @endif
    
</div>