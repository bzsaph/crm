@extends('layouts.adminapp')
@section('content')
 <!-- Main section-->
 <section class="section-container">
    <div class="container">
        <h2>message from users</h2>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>name</th>
              <th>email</th>
              <th>view</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($message as $item)
              <tr>
                <td>{{ $item->name }}</td>
                <td><a href = "mailto: {{ $item->email }}">{{ $item->email }}</a></td>
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#e{{ $item->id }}">
                    {{ $item->name }}
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="e{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            {{ $item->message }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              @endforeach


          </tbody>
        </table>
      </div>

 </section>

@endsection
