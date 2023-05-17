<div  class="modal fade" id="staticBackdrop{{$comic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Stai cercando di eliminare: {{$comic->title}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare il fumetto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          <form action="{{route('comics.destroy',['comic'=>$comic->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Conferma</button>
        </form>
        </div>
      </div>
    </div>
  </div>