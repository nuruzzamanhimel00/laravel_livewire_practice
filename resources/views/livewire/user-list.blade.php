<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <h1> User List

                            <span class="badge badge-primary">{{$userCount}}</span>
                        </h1>
                    </div>
                    <div class="card-body" wire:poll.visible.5s >
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>

                              </tr>
                            </thead>
                            <tbody>
                                @if($users->count() >0)
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>

                                </tr>
                                @endforeach
                              @endif

                            </tbody>
                          </table>
                          <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">

                            {{ $users->links("vendor.livewire.test-bootstrap",['scrollTo' => false]) }} <!-- No need to pass 'vendor.pagination.bootstrap-4' if using Livewire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
