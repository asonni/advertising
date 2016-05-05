<div id="hideModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" ng-click="$hide()">&times;</button>
        <h5 class="modal-title">{{hideTitle}}</h5>
      </div>
      <form ng-submit="confirmHide(id)">
        <div class="modal-body">
          <h5>{{hideMessage}}</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" ng-click="hideModel.hide()">لا</button>
          <button type="submit" class="btn btn-info">نعم</button>
        </div>
      </form>
    </div>
  </div>
</div>