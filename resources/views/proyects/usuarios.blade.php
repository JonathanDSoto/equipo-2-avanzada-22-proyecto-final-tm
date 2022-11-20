@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Usuarios</h4>
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th>Modulo</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Porsentaje de avance</th>
                        
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>                        
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> 


    
@endsection

@section('scripts')
          <!-- Required datatable js -->
          <script src="{{asset('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
          <script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
          <!-- Buttons examples -->
          <script src="{{asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
          <script src="{{asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
          <script src="{{asset('libs/jszip/jszip.min.js')}}"></script>
          <script src="{{asset('libs/pdfmake/build/pdfmake.min.js')}}"></script>
          <script src="{{asset('libs/pdfmake/build/vfs_fonts.js')}}"></script>
          <script src="{{asset('libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
          <script src="{{asset('libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
          <script src="{{asset('libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
          
          <!-- Responsive examples -->
          <script src="{{asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
          <script src="{{asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
  
          <!-- Datatable init js -->
          <script src="{{asset('js/pages/datatables.init.js')}}"></script>    
@endsection