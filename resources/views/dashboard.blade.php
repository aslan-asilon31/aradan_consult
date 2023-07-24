@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">

                @if(session('registerSuccess'))
                @endif
                <h3 class="card-title">Daftar Antrian</h3>

                <h1>Text-to-Speech</h1>

                <div>
                    <input type="text" id="textToSpeak" placeholder="Enter text to speak">
                    <button id="readButton" onclick="speakText()">Read</button>
                </div>
  
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search Mail">
                    <div class="input-group-append">
                      <div class="btn btn-primary">
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive mailbox-messages">
                  <table class="table table-hover table-striped" id="users-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Problem</th>
                            <th>Ticket antrian</th>
                            <th>No antrian</th>
                        </tr>
                    </thead>
                </table>
                
                  <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->



      
    <!-- Contoh modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Mohon masukan nomor Hp dan saran atau tanggapan agar mendapatkan kode tiket antrian</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('store-or-update-phone') }}">
                  @csrf
                  <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" required>
                  </div>
                  <div class="form-group"> <!-- Add this div for the description input -->
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', auth()->user()->description) }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
          
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      $(document).ready(function() {
          


      var dataPhone = {!! json_encode(auth()->user()->phone) !!};
      var dataDescription = {!! json_encode(auth()->user()->description) !!};

      if (dataPhone === null || dataPhone === false || dataPhone === '' || dataPhone === 0 || dataDescription === null || dataDescription === false || dataDescription === '') {
          // Menampilkan modal jika kondisinya terpenuhi
          $('#myModal').modal('show');
      }



      });
  </script>





@stop

@section('css')
<style>
  .highlight{
  background-color:#EF4444;
  color:white;
}
</style>
@stop



@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(function () {
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route("users.datatables") }}',
          columns: [
              { data: 'name', name: 'name' },
              { data: 'phone', name: 'phone' },
              { data: 'description', name: 'description' },
              { data: 'ticket', name: 'ticket', orderable: false, searchable: false },
              { data: 'queue_number', name: 'queue_number', orderable: false, searchable: false }
          ],

          createdRow: function (row, data, dataIndex) {
                var loggedInUserName = '{{ auth()->user()->name }}';

                if (data.name === loggedInUserName) {
                    $(row).addClass('highlight');
                }
          }


      });
  });
</script>



<script>
    function speakText() {
        const text = document.getElementById('textToSpeak').value;

        if ('speechSynthesis' in window) {
            const speech = new SpeechSynthesisUtterance();
            speech.text = text;
            speech.lang = 'id-ID'; // Set the language to Bahasa Indonesia
            speechSynthesis.speak(speech);
        } else {
            alert('Text-to-speech tidak didukung di browser ini.');
        }
    }
</script>



@stop

