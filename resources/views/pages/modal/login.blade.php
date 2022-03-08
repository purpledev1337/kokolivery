{{-- sezione login --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Login')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('login')}}" method="POST">

                @method('POST')
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="col-form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" value="LOGIN">Login</button>

                </form>
            </div>
        </div>
    </div>
</div>