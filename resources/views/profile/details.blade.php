<div class="card mb-4">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    @if(Auth::user()->image)
                    <img class="d-flex justify-content-center align-items-center rounded" src="/images/{{Auth::user()->image}}" alt="profile_image" style="height: 140px; background-color: rgb(233, 236, 239);">
                    @else
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{Auth::user()->name}}</h4>
                    <div class="mt-2">
                        <form action="{{route('profile.upload')}}" method="POST" enctype="multipart/form-data" id="avatar">
                            @csrf
                            <input type="file" name="image" id="image">
                            <button class="btn btn-primary" type="submit" form="avatar">
                                <span>Change Photo</span>
                            </button>
                        </form>
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge text-bg-dark">{{Auth::user()->role}}</span>
                    <div class="text-muted"><small>Joined {{Auth::user()->created_at}}</small></div>
                  </div>
                </div>
              </div>

                  <form class="form" id="bio" action="{{route('profile.setBio')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              @if (Auth::user()->description)
                              <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="My Bio">{{Auth::user()->description}}</textarea>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit" form="bio">Set Bio</button>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
</div>
