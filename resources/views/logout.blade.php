  
  <!-- Modal -->
  <div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title h1" id="exampleModalLongTitle">Logout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="h1">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p class="text-danger h3">Are you sure want to Logout?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-lg btn-secondary" data-dismiss="modal" style="font-size: 20px"><i class="fas fa-window-close"></i> Close</button>
          <form action="{{ route('logout') }}" method="POST">
            @csrf             
                <button type="submit" class="btn-lg btn-danger" style="font-size: 20px">
                  <i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
      </div>
    </div>
  </div>