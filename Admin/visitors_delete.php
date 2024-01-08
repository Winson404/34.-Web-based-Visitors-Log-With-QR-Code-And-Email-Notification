
<!-- VIEW PROFILE PHOTO -->
<div class="modal fade" id="viewphoto<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Visitor's QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
          <img src="../images-QR Code/<?php echo $row['qr_image']; ?>" alt="" width="300" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
      </div>
      <div class="modal-footer alert-light d-flex justify-content-center">
        <a href="../images-QR Code/<?php echo $row['qr_image']; ?>" type="button" class="btn bg-gradient-primary" download><i class="fa-solid fa-download"></i> Download</a>
      </div>
    </div>
  </div>
</div>


<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Delete Visitor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['Id']; ?>" name="Id">
          <h6 class="text-center">Delete visitor record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_user"><i class="fas fa-trash"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>





