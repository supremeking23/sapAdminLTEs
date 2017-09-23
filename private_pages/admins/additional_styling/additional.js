
//for navigations

         



 $(document).ready(function(){
      $('#errormodal').modal('show');
    });


  $(document).ready(function(){
    $('#successmodal').modal('show');
  });



//datatables
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })




    $(function () {
    $('.datatable').DataTable()
    $('.example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })


//for tooltip
 $(document).ready(function(){
       $('[data-tooltip="tooltip"]').tooltip();
    });

