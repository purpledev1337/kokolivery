{{-- sezione delete dish --}}
<div class="modal fade" id="deleteRestaurantConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('CONFERMA ELIMINAZIONE RISTORANTE')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('restaurant.delete') }}" method="GET">
                    @method('GET')
                    @csrf
                    <h5>Vuoi davvero eliminare il ristorante?</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                    <button type="submit" class="btn btn-danger">CONFERMA</button>
                    <input class="form-control" id="pass_id" name="pass_id" type="hidden">
                </form>
            </div>
        </div>
    </div>
</div> 

<script type="application/javascript">
    $(document).ready(function () {
        $("#deleteRestaurantConfirmation").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            $('#pass_id').val(id);
        });
    });
</script>