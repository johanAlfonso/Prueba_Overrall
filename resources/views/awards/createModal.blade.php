<!-- Create Modal -->
<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Register @{{awards_to_register}} award</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('award.store')}}" method="POST">
            @csrf
            <div class="modal-body" style="padding-left: 20px; padding-right: 20px;">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="InputAward" placeholder="award" name="award" aria-describedby="nameHelp" :value="awards_to_register" readonly>
                    <label for="InputAward" class="form-label">Award</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="InputName" placeholder="name" name="name" aria-describedby="nameHelp">
                    <label for="InputName" class="form-label">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="InputLastName" placeholder="lastname" name="lastname" aria-describedby="nameHelp">
                    <label for="InputLastName" class="form-label">Last name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="InputAddress" placeholder="address" name="address" aria-describedby="nameHelp">
                    <label for="InputAddress" class="form-label">Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="Inputnumber" placeholder="3112345678" name="number" aria-describedby="nameHelp">
                    <label for="Inputnumber" class="form-label">cellphone number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="InputEmail" placeholder="correo@email.com" name="email" aria-describedby="emailHelp">
                    <label for="InputEmail" class="form-label">Email</label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal()">Close</button>
              <button type="submit" class="btn btn-primary">Create Award</button>
            </div>
        </form>
      </div>
    </div>
</div>