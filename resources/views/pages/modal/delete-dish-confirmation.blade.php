{{-- sezione delete dish --}}
<div class="modal fade" id="deleteDishConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('CONFERMA ELIMINAZIONE PIATTO')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dish.delete') }}">

                    <h5>Vuoi davvero eliminare il piatto?</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                    <button type="submit" class="btn btn-danger">CONFERMA</button>
                    <input class="form-control" id="pass_id" name="pass_id" type="hidden" >
                </form>
            </div>
        </div>
    </div>
</div> 

<script type="application/javascript">
    $(document).ready(function () {
        $("#deleteDishConfirmation").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            $('#pass_id').val(id);
        });
    });
</script>