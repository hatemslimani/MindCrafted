@extends('layouts.admin')
    @section('content')
        <h1 class="mt-4"></h1>
          @if(count($data))
          <div class="alert alert-warning alert-dismissible fade show " role="alert"><strong>ilya {{count($data)}} nouvaux utilisateur</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          @endif
        @if(count($data))
        <div class="table-responsive">
            <table  id="tabledata" class=" table table-striped table-hover table-bordered">
                    <tr class="bg-dark text-white text-center">
                        <th> Id </th>
                        <th> nom et prenom </th>
                        <th>email</th>
                        <th>category</th>
                        <th> Delete </th>
                        <th> Update </th>
                    </tr >
                @foreach($data as $row)
                    <tr class="text-center">
                        <td>  {{$row->id}} </td>
                        <td>  {{$row->name}} </td>
                        <td>  {{$row->email }} </td>
                        <td>  ------------ </td>
                        <td> <button class="btn-danger btn" name="sup"> <a href="deleteuser/{{ $row->id }}" class="text-white"> Delete </a></button> </td>
                        <td> <a class="btn-primary btn updetat" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$row->id}}">  Update </a> </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>aucun nouvaux utilisateur</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">

            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">


                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">update category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  method="Post" id="fupd" action="">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                                <select class="form-control form-control-lg" name="category">
                                    <option>select categorie</option>
                                    <option value="2">Teacher</option>
                                    <option value="1">Moderateur</option>
                                    <option value="3">Etudiant</option>
                                </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save change</button>
                </div>
                </div>
                </form>
            </div>
            </div>


            <script>
                $(document).on("click", ".updetat", function (e) {
                        e.preventDefault();
                        var _self = $(this);
                        var id = _self.data('id');
                        $("#fupd").attr("action", "updateGat/"+id);
                });
                
            </script>
    @endsection