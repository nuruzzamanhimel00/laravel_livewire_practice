<div>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="{{$grid ? $grid : 'col-md-8'}} ">
                <div class="card">
                    <div class="card-header">
                        <h1> User Register </h1>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit="registerUserHandler">
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" wire:model="name" class="form-control" id="name" aria-describedby="emailHelp">
                              @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" wire:model="email" class="form-control" id="email" aria-describedby="emailHelp">
                              @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" wire:model="password" class="form-control" id="exampleInputPassword1">
                              @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                              <div class="form-group">
                                  <label for="exampleInputPassword1">Image</label>
                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" wire:model="image" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div wire:loading wire:target="image">Uploading...</div>
                                <!--- Tempory Image Preview ---->
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="50" height="50">
                                @endif
                              </div>

                            <button type="submit" class="btn btn-primary"
                            wire:loading.attr="disabled"
                        
                            >Create dd</button>

                            <div wire:loading  wire:target="registerUserHandler"class="text-success">Loading...</div>
                          </form>

                          {{-- <button type="button" class="btn btn-success"
                          wire:click="reloadUserList"
                          >Reload Userlist</button> --}}
                          <!---Alpain Using Livewire -->
                          <button type="button" class="btn btn-success"
                              wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                          @click="$dispatch('refresh-user-list')"
                          >Reload Userlist</button>
                    </div>
                </div>
            </div>
            <div class="{{$grid ? $grid : 'col-md-8'}}">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">image</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($users->count() >0)
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if(!is_null($user->image))

                                <img src="{{asset('storage/'.$user->image)}}" width="50" height="50" alt="">

                                @endif
                            </td>
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
