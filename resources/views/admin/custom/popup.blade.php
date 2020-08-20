<style>
.swal2-popup {
    display: none;
    position: relative;
    flex-direction: column;
    justify-content: center;
    width: 32em;
    max-width: 100%;
    padding: 1.25em;
    border-radius: 0.3125em;
    background: #fff;
    font-family: inherit;
    font-size: 1.25rem;
    box-sizing: border-box;
}
</style>

<script>
    $(document).ready(function() { 
    /* code here */ 
      swal({
        title: "Data not found!", 
        text: "Do you want to add new data customer?", 
        type: "info",
        confirmButtonText: "Yes",
        showCancelButton: true
        })
          .then((result) => {
          if (result.value) {
              window.location = '{{Route('customer.create')}}';
          } 
          // else if (result.dismiss === 'cancel') {
          //     swal(
          //       'Cancelled',
          //       'Your stay here :)',
          //       'error'
          //     )
          // }
        })
    });
</script>