<main role="main" class="container">
        <div class="row">
                <div class="row">
                  <div class="col-md-2">        
                        {{$user->id}}
                </div>
                  <div class="col-md-2">                
                        {{$user->name}}
                </div>
                  <div class="col-md-2">              
                        {{$user->email}}
                </div>
                        <div class="btn-group">
                          <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Options <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                                  <li><a href="/users/{{ $user->id }}">    Edit</a></li>                        
                                  <li><a href="/users/delete/{{ $user->id }}">    Delete</a></li>
                          </ul>
                        </div>
                </div>
        </div><!-- /.row -->
</main><!-- /.container -->