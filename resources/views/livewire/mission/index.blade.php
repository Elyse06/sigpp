<div wire:ignore.self class="w-100" style="height: 100%">

    @if ($currentPage == PAGECREATFORM)
        @include("livewire.mission.ajout")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.mission.edit")
    @endif

    @if ($currentPage == PAGELIST)
        @include("livewire.mission.list")
    @endif
    
</div>
