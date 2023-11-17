<div wire:ignore.self class="w-100" style="height: 100%">

    @if ($currentPage == PAGECREATFORM)
        @include("livewire.employee.ajout")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.employee.edit")
    @endif

    @if ($currentPage == PAGELIST)
        @include("livewire.employee.liste")
    @endif
    
</div>

<script>
    window.addEventListener("comfirmMessage", event=>{
         Swal.fire({
             title: event.detail.message.title,
             text: event.detail.message.text,
             icon: event.detail.message.type,
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'continuer',
             cancelButtonText: 'Annuler'
             }).then((result) => {
             if (result.isConfirmed) {
                 @this.deleteEmployee(event.detail.message.data.employee_id)
             }
 
         })
     })
     
     window.addEventListener("showSuccesMessage", event=>{
         Swal.fire({
             position: 'top-end',
             icon:'success',
             toast: true,
             title: event.detail.message || "Opération effectuer avec succès",
             showConfirmButton: false,
             timer: 5000
         })
     })
 </script>