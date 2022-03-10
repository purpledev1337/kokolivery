@extends('layouts.main-layout')
@section('content')
    {{-- //jumbotron --}}

    <div id="containerJumbo">
        <div id="jumbotron">
            <h1 class="titoloJumbo">
               <em> Decidi tu dove e quando Lavorare</em><br>
               Presto arriveremo anche nella tua città<br>
                   <button data-bs-toggle="modal" data-bs-target="#rider" class="btn" type="submit">CANDIDATI SUBITO!</button>
            </h1 class="titoloJumbo">
        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="rider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ATTENZIONE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Spiacenti questo servizio al momento ancora non è disponibbile!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection