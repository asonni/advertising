<div class="well well-sm">
  <h3>تعديل اعلان</h3>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <form ng-submit="editAd()">
        <div class="form-group">
        <label>عنوان الاعلان</label>
        <input type="text" class="form-control" ng-model="editAdForm.ads_name" placeholder="عنوان الاعلان">
        </div>
        <div class="form-group">
          <label>محتوى الاعلان</label>
          <div text-angular="text-angular" name="ads_description" ng-model="editAdForm.ads_description" ta-disabled='disabled'></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-2 col-md-offset-4">
            <button type="submit" class="btn btn-warning btn-sm btn-block"><i class="fa fa-plus"></i>&nbsp;تعديل</button>
          </div>
          <div class="col-md-2">
            <a class="btn btn-success btn-sm btn-block" ui-sref="adsList"><i class="fa fa-ban"></i>&nbsp;إلغاء</a>
          </div>
        </div>
        <br><br>
      </form>
    </div>
  </div>
</div>